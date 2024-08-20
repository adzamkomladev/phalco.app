<?php

namespace App\Actions\Organizations;

use App\Models\Organization;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class Select
{
    use AsAction;

    public function asController()
    {
        $this->handle(request()->user(), request()->input('organization_id'));
        return redirect()->route('home');
    }

    public function handle(User $user, int $organizationId): void
    {
        $user->selectOrganization($organizationId);
    }
}
