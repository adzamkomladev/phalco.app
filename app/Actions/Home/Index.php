<?php

namespace App\Actions\Home;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly('home.index');
    }

    public function handle()
    {
        // ...
    }
}
