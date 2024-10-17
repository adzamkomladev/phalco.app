<?php

namespace App\Actions\Voting\Requests;

use App\Models\Ballot;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController()
    {
        $data = $this->handle(auth()->id(), request()->input('ballot_id'));

        return view('voting.requests.create', $data)->base('voting.requests.index');
    }

    public function handle(int $userId, int $ballotId)
    {
        $ballot = Ballot::with(['options', 'voteEntryRequests'])->find($ballotId);

        return [
            'ballot' => $ballot,
            'completed' => [],
        ];
    }
}
