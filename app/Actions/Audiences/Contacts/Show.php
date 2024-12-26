<?php

namespace App\Actions\Audiences\Contacts;

use App\Actions\Common\GetCountries;
use App\Data\Audiences\Contacts\ContactData;
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

    public function handle(int $id): array
    {
        $contact = Contact::find($id);

        $data = GetCountries::run($contact->country ?? 'GH');

        return [
            'contact' => ContactData::from($contact),
            'country' => collect($data['countries'])->first()
        ];
    }
}
