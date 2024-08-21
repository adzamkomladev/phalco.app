<?php

namespace App\Actions\Settings\Team;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\Settings\Team\InvitationCreated;
use App\Models\OrganizationInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateInvitation
{
    use AsAction;

    public function asJob(int $invitedBy, int $organizationId, string $organizationName, string $email, string $role): void
    {
        $this->handle($invitedBy, $organizationId, $organizationName, $email, $role);
    }


    public function handle(int $invitedBy, int $organizationId, string $organizationName, string $email, string $role)
    {
        $token = (string) Str::ulid();

        OrganizationInvitation::create([
            'organization_id' => $organizationId,
            'user_id' => $invitedBy,
            'email' => $email,
            'token' => $token,
            'expires_at' => now()->addDays(7),
            'status' => 'pending',
            'role' => $role,
        ]);

        $url = route('organizations.invitations.verify', ['token' => $token]);

        Mail::to($email)->send(new InvitationCreated($organizationName, $url));
    }
}
