<?php

namespace App\Actions\Settings\Team;

use App\Models\OrganizationInvitation;
use App\Models\OrganizationMembership;
use App\Models\User;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

class VerifyInvitation
{
    use AsAction;

    public function asController(string $token)
    {
        $res = $this->handle(auth()->id(), auth()->user()->email, $token);

        if ($res === null) return hybridly('settings.team.verify-invitation', [
            'error' => 'Invitation is expired or invalid!'
        ]);

        return hybridly('settings.team.verify-invitation', ['success' => 'Invitation accepted']);
    }

    public function handle(int $userId, string $email, string $token): ?OrganizationInvitation
    {
        $invitation = OrganizationInvitation::pending()
            ->where('token', $token)
            ->where('email', $email)
            ->first();

        if ($invitation === null) return null;

        $organizationId = $invitation->organization_id;
        $invitationId = $invitation->id;
        $invitationRoleId = $invitation->organization_role_id;
        $invitationRoleName = $invitation->role?->name;

        [$invitation] = Octane::concurrently([
            fn() => OrganizationInvitation::find($invitationId)->accept(),
            fn() => OrganizationMembership::create([
                'user_id' => $userId,
                'organization_id' => $organizationId,
                'organization_role_id' => $invitationRoleId,
                'roleTitle' => $invitationRoleName,
                'status' => 'active',
            ]),
            fn() => User::where('id', $userId)->update(['selected_organization_id' => $organizationId]),
        ]);

        return $invitation;
    }
}
