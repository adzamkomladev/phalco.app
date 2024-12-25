<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Support\Gateways\Arkesel;
use Lorisleiva\Actions\Concerns\AsAction;

class ProcessCampaignRequests
{
    use AsAction;

    public string $jobQueue = 'campaigns';

    public function __construct(private Arkesel $arkesel) {}

    public function asJob(int $campaignId, array $requests): void
    {
        try {
            $this->handle($campaignId, $requests);
        } catch (\Exception $e) {
            logger()->error('Handle process campaign requests error: {error}', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $campaignId, array $requests)
    {
        $campaign = Campaign::where('id', $campaignId)->where('status', 'processing')->first();

        if (! $campaign) {
            logger()->error('Campaign: {campaignId} is not processing', ['campaignId' => $campaignId]);

            return;
        }

        $requestsCollection = collect($requests);
        $recipients = $requestsCollection->pluck('recipient')->all();

        $response = null;

        try {
            $response = $this->arkesel->sendSms($recipients, $campaign->message, $campaign->data['sender']);
        } catch (\Exception $e) {
            logger()->error('Failed to send sms via arkesel gateway with error: {error}', ['error' => $e->getMessage()]);

            return;
        }

        $responseDataCollection = collect($response['data']);

        $requestsCollection
            ->each(function (array $request) use ($responseDataCollection) {
                $recipientResponse = $responseDataCollection->firstWhere('recipient', $request['recipient']);
                ProcessCampaignRequest::dispatch($request, $recipientResponse);
            });
    }
}
