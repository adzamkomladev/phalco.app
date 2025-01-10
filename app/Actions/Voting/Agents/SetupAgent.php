<?php

namespace App\Actions\Voting\Agents;

use App\Mail\Voting\Agents\AgentCreated;
use App\Models\OrganizationMembership;
use App\Models\OrganizationRole;
use App\Models\User;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class SetupAgent
{
    use AsAction;

    public function asJob(int $organizationId, array $data): void
    {
        $this->handle($organizationId, $data);
    }

    public function handle(int $organizationId, array $data)
    {
        [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
        ] = $data;

        $password = config('settings.agent.password');
        $role = 'customer';
        $avatar = "https://ui-avatars.com/api/?name={$firstName}+{$lastName}&background=random";

        [$organizationRole, $user] = Concurrency::run([
            fn () => OrganizationRole::with('organization')
                ->where('organization_id', $organizationId)
                ->where('name', 'agent')
                ->first(),
            fn () => User::where('email', $email)->first() ?? User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => $role,
                'avatar' => $avatar,
            ]),
        ]);

        $organizationMembership = OrganizationMembership::where('user_id', $user->id)
            ->where('organization_id', $organizationId)
            ->first();

        if ($organizationMembership) {
            return;
        }

        OrganizationMembership::create([
            'user_id' => $user->id,
            'organization_id' => $organizationId,
            'organization_role_id' => $organizationRole->id,
            'roleTitle' => $organizationRole->name,
            'status' => 'active',
        ]);

        Mail::to($email)->send(new AgentCreated(
            organizationName: $organizationRole->organization->name,
            agentName: $user->name,
            email: $email,
            password: $password
        ));
    }
}
