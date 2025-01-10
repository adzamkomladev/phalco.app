<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class CheckForScheduledCampaigns
{
    use AsAction;

    public function handle()
    {
        Campaign::select(['id', 'status', 'scheduled_at', 'type'])
            ->where('status', 'pending')
            ->where('scheduled_at', '<=', now())
            ->where('type', 'sms')
            ->chunkById(
                100,
                fn (Collection $campaigns) => $campaigns->each(fn (Campaign $campaign) => ProcessCampaign::dispatch($campaign->id))
            );
    }
}
