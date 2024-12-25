<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Models\CampaignRequest;
use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Collection;


class SetupCampaign
{
    use AsAction;

    public string $jobQueue = 'campaigns';

    public function asJob(int $campaignId): void
    {
        try {
            $this->handle($campaignId);
        } catch (\Exception $e) {
            logger()->error('Handle setup campaign error: {error}', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $campaignId)
    {
        $campaign = Campaign::find('id', $campaignId);

        Contact::select(['id', 'phone', 'audience_id'])
            ->where('audience_id', $campaign->audience_id)
            ->chunkById(100, function (Collection $contacts) use ($campaign) {
                $currentTime = now();
                $data = $contacts
                    ->map(function (Contact $contact) use ($campaign, $currentTime) {
                        return [
                            'contact_id' => $contact->id,
                            'campaign_id' => $campaign->id,
                            'recipient' => $contact->phone,
                            'cost' => $campaign->cost['message_cost'],
                            'status' => 'pending',
                            'created_at' => $currentTime,
                            'updated_at' => $currentTime,
                        ];
                    })
                    ->toArray();

                CampaignRequest::insert($data);
            }, column: 'id');

        $campaign->update([
            'status' => 'pending'
        ]);

        if (!$campaign->scheduled_at) {
            ProcessCampaign::dispatch($campaignId);
        }
    }
}
