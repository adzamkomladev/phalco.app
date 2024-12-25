<?php

namespace App\Actions\Campaigns\Sms;

use App\Data\MiniCardStatData;
use App\Models\Campaign;
use App\Tables\Campaigns\Sms\SmsCampaignsTable;
use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('campaigns.sms.index', $this->handle(request()->user()->selected_organization_id));
    }

    public function handle(int $organizationId)
    {
        return [
            'stats' => MiniCardStatData::collect([
                [
                    'title' => 'Total Active Campaigns',
                    'value' => 0,
                ],
                [
                    'title' => 'Total contacts',
                    'value' => 0,
                ],
            ]),
            'notifications' => [],
            'campaigns' => SmsCampaignsTable::make(['organizationId' => $organizationId]),
        ];
    }
}
