<?php

namespace App\Actions\Settings\Team;

use App\Data\Settings\Team\InvitationData;
use App\Models\OrganizationInvitation;
use App\Models\User;
use Carbon\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;

class Invitations
{
    use AsAction;

    public function asController()
    {
        return view('settings.team.invitations', [
            'invitations' => $this->handle(request()->user()),
        ])->base('settings.team');
    }

    public function handle(User $user)
    {
        $data = OrganizationInvitation::pending()
            ->where('organization_id', $user->currentOrganization->id)
            ->get()
            ->map(function (OrganizationInvitation $invitation) {
                $invitation->expires_at = Carbon::parse($invitation->expires_at)->diffForHumans();
                return $invitation;
            });

        return InvitationData::collect($data);
    }
}
