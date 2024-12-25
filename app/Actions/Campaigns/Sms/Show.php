<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use App\Tables\Campaigns\Sms\RequestsTable;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('campaigns.sms.show', $this->handle($id));
    }

    public function handle(int $campaignId)
    {
        return [
            'campaign' => Campaign::with([
                'activities:id,campaign_id,status,created_at',
                'activities.updatedBy:id,first_name,last_name,avatar'
            ])->find($campaignId),
            'requests' => RequestsTable::make(['campaignId' => $campaignId]),
        ];
    }
}
