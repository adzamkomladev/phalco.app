<?php

namespace App\Actions\Elections;

use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController()
    {

        return view('elections.create')->base('elections.index');
    }

    public function handle()
    {
        // ...
    }
}
