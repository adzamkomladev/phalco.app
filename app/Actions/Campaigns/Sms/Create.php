<?php

namespace App\Actions\Campaigns\Sms;

use App\Data\Campaigns\Sms\SenderData;
use App\Models\SmsSender;
use Lorisleiva\Actions\Concerns\AsAction;

class Create
{
    use AsAction;

    public function asController()
    {
        return hybridly('campaigns.sms.create', $this->handle(request()->user()->selected_organization_id));
    }


    public function handle(int $organizationId)
    {
        $senders = SmsSender::where('organization_id', $organizationId)->get();

        return [
            'senders' => SenderData::collect($senders)
        ];
    }
}
