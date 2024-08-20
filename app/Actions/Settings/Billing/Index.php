<?php

namespace App\Actions\Settings\Billing;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('settings.billing');
    }


    public function handle()
    {
        // ...
    }
}
