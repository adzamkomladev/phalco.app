<?php

namespace App\Actions\Audiences\Contacts;

use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController(int $id)
    {

        return view('audiences.contacts.create')
            ->base('audiences.show', ['id' => $id]);
    }

    public function handle()
    {
        // ...
    }
}
