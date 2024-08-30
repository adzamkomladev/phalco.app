<?php

namespace App\Actions\Settings\Team;

use App\Data\Settings\Team\RoleData;
use App\Models\OrganizationRole;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;

class Roles
{
    use AsAction;

    public function asController()
    {
        return view('settings.team.roles', [
            'roles' => $this->handle(request()->user()->selected_organization_id),
        ])->base('settings.team.index');
    }

    public function handle(int $selectedOrganizationId)
    {
        $data = OrganizationRole::where('organization_id', $selectedOrganizationId)->get();

        return RoleData::collect($data);
    }
}
