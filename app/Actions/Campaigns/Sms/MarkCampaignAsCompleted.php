<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Models\CampaignActivity;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class MarkCampaignAsCompleted
{
    use AsAction;

    public string $jobQueue = 'campaigns';

    public function asJob(int $campaignId): void
    {
        try {
            $this->handle($campaignId);
        } catch (\Exception $e) {
            logger()->error('Handle mark campaign as completed error: {error}', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $campaignId)
    {
        $this->markCampaignAsCompleted($campaignId);
    }

    private function markCampaignAsCompleted(int $campaignId): Campaign
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::find($campaignId);

            $campaign->update([
                'status' => 'completed',
            ]);

            CampaignActivity::create([
                'campaign_id' => $campaign->id,
                'status' => 'completed',
                'user_id' => $campaign->user_id,
                'reason' => 'Mark campaign as completed from cron',
            ]);

            DB::commit();

            return $campaign;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
