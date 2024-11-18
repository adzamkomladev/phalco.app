<?php

namespace App\Actions\Audiences\Contacts;

use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Show
{
    use AsAction;

    public function asController(int $id, int $contactId)
    {
        return view('audiences.contacts.show', $this->handle($contactId))
            ->base('audiences.show', ['id' => $id]);
    }

    public function handle(int $id)
    {
        $contact = Contact::find($id);

        return [
            'contact' => $contact,
        ];
    }
}
