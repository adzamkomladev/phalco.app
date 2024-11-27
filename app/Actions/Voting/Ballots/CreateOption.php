<?php

namespace App\Actions\Voting\Ballots;

use App\Models\Election;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class CreateOption
{
    use AsAction;

    public function asController()
    {
        return view('voting.ballots.option-create')->base('voting.ballots.index');
    }

    public function handle(int $organizationId)
    {
        return Election::select(['id', 'name'])->where('organization_id', $organizationId)->get();
    }
}
