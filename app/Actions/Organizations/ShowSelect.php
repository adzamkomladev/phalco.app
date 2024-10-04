<?php

namespace App\Actions\Organizations;

use App\Data\Organizations\OrganizationData;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowSelect
{
    use AsAction;

    public function asController()
    {
        return hybridly('organizations.show-select', [
            'organizations' => $this->handle(request()->user()),
        ]);
    }

    public function handle(User $user)
    {
        return OrganizationData::collect($user->memberOrganizations);
    }
}
