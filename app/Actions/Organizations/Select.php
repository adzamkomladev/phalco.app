<?php

namespace App\Actions\Organizations;

use App\Actions\Agents\LoginSetup;
use App\Models\OrganizationRole;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class Select
{
    use AsAction;

    public function asController()
    {
        $role = $this->handle(request()->user(), request()->input('organization_id'));

        if ($role?->name === 'agent') {
            LoginSetup::run(request()->user()->id, request()->input('organization_id'));

            return redirect()->intended(route('home.agents'));
        }

        return redirect()->route('home');
    }

    public function handle(User $user, int $organizationId): ?OrganizationRole
    {
        $user->selectOrganization($organizationId);

        cache()->forget("elections.selected.{$user->id}");
        cache()->forget("agentPollingStation.selected.{$user->id}");

        return $user?->selectedOrganizationMembership?->role;
    }
}
