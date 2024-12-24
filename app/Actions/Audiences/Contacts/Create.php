<?php

namespace App\Actions\Audiences\Contacts;

use App\Models\Audience;
use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController(int $id)
    {
        $audience = Audience::findOrFail($id);

        return view('audiences.contacts.create',['audience'=>$audience])
            ->base('audiences.show', ['id' => $id]);
    }

    // public function handle(int $id)
    // {
    //     $audience = Audience::select(['id', 'name', 'description'])
    //         ->findOrFail($id);

    //     return [
    //         'audience' => $audience,
    //     ];
    // }
}
