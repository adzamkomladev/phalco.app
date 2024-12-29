<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Models\CampaignRequest;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ProcessCampaign
{
    use AsAction;

    public string $jobQueue = 'campaigns';

    public function asJob(int $campaignId): void
    {
        try {
            $this->handle($campaignId);
        } catch (\Exception $e) {
            logger()->error('Handle process campaign error: {error}', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $campaignId)
    {
        $campaign = Campaign::where('id', $campaignId)->where('status', 'pending')->first();

        if (! $campaign) {
            logger()->error('Campaign: {campaignId} is not pending', ['campaignId' => $campaignId]);

            return;
        }

        $campaign = $campaign->updateStatus($campaign->user_id, 'processing', 'Start processing campaign');

        CampaignRequest::select(['id', 'recipient', 'campaign_id'])
            ->where('campaign_id', $campaign->id)
            ->where('status', 'pending')
            ->chunkById(100, function (Collection $requests) use ($campaign) {
                $data = $requests
                    ->map(fn (CampaignRequest $request) => [
                        'id' => $request->id,
                        'recipient' => $request->phone,
                    ])
                    ->toArray();

                ProcessCampaignRequests::dispatch($campaign->id, $data);
            }, column: 'id');
    }
}
