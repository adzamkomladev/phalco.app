<?php

namespace App\Actions\Voting\Ballots\Options;

use App\Models\Ballot;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;


    public function asController(int $id)
    {
        return view('voting.ballots.options.create', $this->handle($id))
            ->base('voting.ballots.show', ['id' => $id]);
    }

    public function handle(int $ballotId): array
    {
        return [
            'ballot' => Ballot::select(['id', 'position'])
                ->with(['options:id,ballot_id,order'])
                ->find($ballotId)
        ];
    }
}
