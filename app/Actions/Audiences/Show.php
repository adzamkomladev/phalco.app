<?php

namespace App\Actions\Audiences;

use App\Models\Audience;
use App\Tables\Audiences\ContactsTable;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('audiences.show', $this->handle($id));
    }

    public function handle(int $id)
    {
        $audience = Audience::find($id);

        return [
            'audience' => $audience,
            'contacts' => ContactsTable::make(['audienceId' => $id]),
        ];
    }
}
