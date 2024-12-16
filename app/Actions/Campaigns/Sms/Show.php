<?php

namespace App\Actions\Campaigns\Sms;

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
        return [];
    }
}
