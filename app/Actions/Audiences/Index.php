<?php

namespace App\Actions\Audiences;

use App\Tables\Audience\AudiencesTable;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('audiences.index', $this->handle(request()->user()->selected_organization_id));
    }

    public function handle(int $organizationId)
    {
        return [
            'stats' => [
                'totalContacts' => 0,
            ],
            'audiences' => AudiencesTable::make()
        ];
    }
}
