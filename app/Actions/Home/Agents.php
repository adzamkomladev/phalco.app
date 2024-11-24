<?php

namespace App\Actions\Home;

use Lorisleiva\Actions\Concerns\AsAction;

class Agents
{
    use AsAction;

    public function asController()
    {
        return hybridly('home.agents');
    }

    public function handle()
    {
        // ...
    }
}
