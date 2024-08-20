<?php

namespace App\Actions\Settings\Organization;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('settings.organization');
    }

    public function handle()
    {
        // ...
    }
}
