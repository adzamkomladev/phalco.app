<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Models\CampaignActivity;
use App\Models\CampaignRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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

        $campaign = $this->markCampaignAsProcessing($campaign->id);

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

    private function markCampaignAsProcessing(int $campaignId): Campaign
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::find($campaignId);

            $campaign->update([
                'status' => 'processing',
            ]);

            CampaignActivity::create([
                'campaign_id' => $campaign->id,
                'status' => 'processing',
                'user_id' => $campaign->user_id,
                'reason' => 'Start processing campaign',
            ]);

            DB::commit();

            return $campaign;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
