<?php

namespace App\Actions\Settings\Profile;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('settings.profile');
    }

    public function handle()
    {
        // ...
    }
}
