<?php

namespace App\Actions\Agents\Messages;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('agents.messages.index');
    }

    public function handle()
    {
        // ...
    }
}
