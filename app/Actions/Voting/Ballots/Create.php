<?php

namespace App\Actions\Voting\Ballots;

use App\Models\Election;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController()
    {
        $elections = $this->handle(request()->user()->selected_organization_id);

        return view('voting.ballots.create', ['elections' => $elections])
            ->base('voting.ballots.index');
    }

    public function handle(int $organizationId)
    {
        return Election::select(['id', 'name'])->where('organization_id', $organizationId)->get();
    }
}
