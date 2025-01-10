<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class CheckIfCampaignCanBeCompleted
{
    use AsAction;

    public function handle()
    {
        Campaign::select(['id', 'status', 'type'])
            ->where('status', 'processing')
            ->where('type', 'sms')
            ->whereDoesntHave('requests', fn (Builder $query) => $query->where('status', '<>', 'submitted'))
            ->chunkById(
                100,
                fn (Collection $campaigns) => $campaigns->each(fn (Campaign $campaign) => MarkCampaignAsCompleted::dispatch($campaign->id))
            );
    }
}
