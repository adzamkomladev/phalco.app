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
        $res = $this->handle(auth()->id(), $token);

        if ($res === null) return hybridly('settings.team.verify-invitation', [
            'error' => 'Invitation is expired or invalid!'
        ]);

        return hybridly('settings.team.verify-invitation', ['success' => 'Invitation accepted']);
    }

    public function handle(int $userId, string $token): ?OrganizationInvitation
    {
        $invitation = OrganizationInvitation::pending()->where('token', $token)->first();

        if ($invitation === null) return null;

        $organizationId = $invitation->organization_id;
        $invitationId = $invitation->id;
        $invitationRole = $invitation->role;

        [$invitation] = Octane::concurrently([
            fn() => OrganizationInvitation::find($invitationId)->accept(),
            fn() => OrganizationMembership::create([
                'user_id' => $userId,
                'organization_id' => $organizationId,
                'role' => $invitationRole,
                'status' => 'active',
            ]),
            fn() => User::find($userId)->selectOrganization($organizationId),
        ]);

        return $invitation;
    }
}
