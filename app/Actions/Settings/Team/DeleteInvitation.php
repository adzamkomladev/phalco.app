<?php

namespace App\Actions\Settings\Team;

use App\Models\OrganizationInvitation;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteInvitation
{
    use AsAction;

    public function asController(int $id)
    {
        $res = $this->handle($id);

        if (! $res) {
            return back()->with('error', 'Failed to delete invitation');
        }

        return back()->with('info', 'Invitation deleted');
    }

    public function handle(int $id): bool
    {
        return OrganizationInvitation::pending()->where('id', $id)->delete();
    }
}
