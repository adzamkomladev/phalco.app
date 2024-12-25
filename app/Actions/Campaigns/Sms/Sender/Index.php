<?php

namespace App\Actions\Campaigns\Sms\Sender;

use App\Data\Campaigns\Sms\SenderData;
use App\Models\SmsSender;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('campaigns.sms.senders.index', $this->handle(request()->user()->selected_organization_id))
            ->base('campaigns.sms.index');
    }

    public function handle(int $organizationId)
    {
        $senders = SmsSender::where('organization_id', $organizationId)->get();

        return [
            'senders' => SenderData::collect($senders),
        ];
    }
}
