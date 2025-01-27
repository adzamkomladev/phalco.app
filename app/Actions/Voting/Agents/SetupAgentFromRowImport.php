<?php

namespace App\Actions\Voting\Agents;

use App\Mail\Voting\Agents\AgentCreated;
use App\Models\OrganizationMembership;
use App\Models\OrganizationRole;
use App\Models\PollingStation;
use App\Models\User;
use App\Notifications\Voting;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use Propaganistas\LaravelPhone\PhoneNumber;

class SetupAgentFromRowImport
{
    use AsAction;

    public string $jobQueue = 'imports';

    public function asJob(int $electionId, int $organizationId, array $row): void
    {
        $this->handle($electionId, $organizationId, $row);
    }

    public function handle(int $electionId, int $organizationId, array $row)
    {
        [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'code' => $code,
            'name' => $name,
            'phone' => $phone,
        ] = $row;

        $password = config('settings.agent.password');
        $role = 'customer';
        $avatar = "https://ui-avatars.com/api/?name={$firstName}+{$lastName}&background=random";

        $email = $email || $this->generateFakeEmail($firstName);

        if ($phone) {
            $phone = new PhoneNumber($phone, 'GH');
            $phone = $phone->formatE164();
        }

        [$organizationRole, $user] = Concurrency::run(
            [
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
                    'phone' => $phone,
                ]),
            ]
        );

        $canCreatePollingStation = $code && $name;

        [$organizationMembership, $pollingStation] = Concurrency::run([
            fn () => OrganizationMembership::where('user_id', $user->id)
                ->where('organization_id', $organizationId)
                ->first() ??
                OrganizationMembership::create([
                    'user_id' => $user->id,
                    'organization_id' => $organizationId,
                    'organization_role_id' => $organizationRole->id,
                    'roleTitle' => $organizationRole->name,
                    'status' => 'active',
                ]),
            fn () => PollingStation::where('code', $code)
                ->where('election_id', $electionId)
                ->where('organization_id', $organizationId)
                ->first()
                ??
                ($canCreatePollingStation ? PollingStation::create([
                    'name' => $name,
                    'code' => $code,
                    'election_id' => $electionId,
                    'organization_id' => $organizationId,
                ]) : null),
        ]);

        $pollingStation?->update(['user_id' => $user->id]);
        Mail::to($email)->send(new AgentCreated(
            organizationName: $organizationRole->organization->name,
            agentName: $user->name,
            email: $email,
            password: $password
        ));

        if ($phone) {
            $user->notify(
                new Voting\Agents\Created(
                    organizationName: $organizationRole->organization->name,
                    password: $password,
                    pollingStationName: $pollingStation?->name,
                )
            );
        }
    }

    private function generateFakeEmail(string $firstName, string $domain = 'yopmail'): string
    {
        $number = rand(2, 50);
        $firstName = Str::lower($firstName);

        return "{$firstName}{$number}@{$domain}.com";
    }
}
