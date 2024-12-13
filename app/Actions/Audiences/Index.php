<?php

namespace App\Actions\Audiences;

use App\Models\Audience;
use App\Models\Contact;
use App\Tables\Audiences\AudiencesTable;
use Laravel\Octane\Facades\Octane;
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
        [
            $totalAudiences,
            $totalContacts
        ] = Octane::concurrently([
            fn() => Audience::where('organization_id', $organizationId)->count(),
            fn() => Contact::whereRelation('audience', 'organization_id', $organizationId)->count(),
        ]);

        return [
            'stats' => [
                [
                    'description' => 'Total Audiences for Election',
                    'value' => $totalAudiences,
                ],
                [
                    'description' => 'Total contacts',
                    'value' => $totalContacts,
                ],
                [
                    'description' => 'Total contacts',
                    'value' => $totalContacts,
                ],
                [
                    'description' => 'Total contacts',
                    'value' => $totalContacts,
                ]
            ],
            'audiences' => AudiencesTable::make(['organizationId' => $organizationId]),
        ];
    }
}
