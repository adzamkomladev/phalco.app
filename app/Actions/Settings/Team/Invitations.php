<?php

namespace App\Actions\Settings\Team;

use App\Data\Settings\Team\InvitationData;
use App\Data\Settings\Team\RoleData;
use App\Models\OrganizationInvitation;
use App\Models\OrganizationRole;
use Carbon\Carbon;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Invitations
{
    use AsAction;

    public function asController()
    {
        return view('settings.team.invitations', $this->handle(request()->user()->selected_organization_id))
            ->base('settings.team.index');
    }

    public function handle(int $selectedOrganizationId)
    {
        [$invitations, $roles] = Octane::concurrently([
            fn () => OrganizationInvitation::with(['role'])
                ->pending()
                ->where('organization_id', $selectedOrganizationId)
                ->get()
                ->map(function (OrganizationInvitation $invitation) {
                    $invitation->expires_at = Carbon::parse($invitation->expires_at)->diffForHumans();

                    return $invitation;
                }),
            fn () => OrganizationRole::where('organization_id', $selectedOrganizationId)->get(),
        ]);

        return [
            'invitations' => InvitationData::collect($invitations),
            'roles' => RoleData::collect($roles),
        ];
    }
}
