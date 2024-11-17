<?php

namespace App\Actions\Voting\Agents;

use App\Models\OrganizationRole;
use App\Tables\Voting\Agents\AgentsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('voting.agents.index', $this->handle(request()->user()->selected_organization_id));
    }

    public function handle(int $organizationId)
    {
        $role = OrganizationRole::where('organization_id', $organizationId)
            ->where('name', 'agent')
            ->first();

        return [
            'agents' => AgentsTable::make(['organizationId' => $organizationId, 'roleId' => $role?->id]),
        ];
    }
}
