<?php

namespace App\Actions\Agents\Requests;

use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController()
    {
        return hybridly('agents.requests.show');
    }

    public function handle()
    {
        // ...
    }
}
