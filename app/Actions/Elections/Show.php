<?php

namespace App\Actions\Elections;

use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('elections.show');
    }

    public function handle()
    {
        // ...
    }
}
