<?php

namespace App\Actions\Audiences;

use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController()
    {
        return view('audiences.create')->base('audiences.index');
    }

    public function handle()
    {
        // ...
    }
}
