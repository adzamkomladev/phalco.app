<?php

namespace App\Actions\Organizations;

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
            return redirect()->intended(route('home.agents'));
        }

        return redirect()->route('home');
    }

    public function handle(User $user, int $organizationId): ?OrganizationRole
    {
        $user->selectOrganization($organizationId);

        return $user?->selectedOrganizationMembership?->role;
    }
}
