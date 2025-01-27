<?php

namespace App\Actions\Settings\Team;

use App\Mail\Settings\Team\InvitationCreated;
use App\Models\OrganizationInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateInvitation
{
    use AsAction;

    public function asJob(int $invitedBy, int $organizationId, string $organizationName, string $email, int $roleId): void
    {
        $this->handle($invitedBy, $organizationId, $organizationName, $email, $roleId);
    }

    public function handle(int $invitedBy, int $organizationId, string $organizationName, string $email, int $roleId)
    {
        $token = (string) Str::ulid();

        OrganizationInvitation::create([
            'organization_id' => $organizationId,
            'organization_role_id' => $roleId,
            'user_id' => $invitedBy,
            'email' => $email,
            'token' => $token,
            'expires_at' => now()->addDays(7),
            'status' => 'pending',
        ]);

        $url = route('organizations.invitations.verify', ['token' => $token]);

        Mail::to($email)->send(new InvitationCreated($organizationName, $url));
    }
}
