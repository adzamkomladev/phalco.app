<?php

namespace App\Actions\Elections;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {

        return hybridly('elections.index');
    }

    public function handle()
    {
        // ...
    }
}
