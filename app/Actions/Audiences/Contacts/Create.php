<?php

namespace App\Actions\Audiences\Contacts;

use App\Data\Audiences\AudienceData;
use App\Models\Audience;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController(int $id)
    {
        return view('audiences.contacts.create', $this->handle($id))
            ->base('audiences.show', ['id' => $id]);
    }

    public function handle(int $audienceId)
    {
        $audience = Audience::select(['id', 'name', 'description', 'status'])
            ->findOrFail($audienceId);

        return [
            'audience' => AudienceData::optional($audience),
        ];
    }
}
