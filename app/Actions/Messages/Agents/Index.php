<?php

namespace App\Actions\Messages\Agents;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('home.agents.messages');
    }

    public function handle()
    {
        // ...
    }
}
