<?php

namespace App\Actions\Settings\Team;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('settings.team');
    }

    public function handle()
    {
        // ...
    }
}
