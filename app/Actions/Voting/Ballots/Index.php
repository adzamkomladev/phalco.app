<?php

namespace App\Actions\Voting\Ballots;

use App\Tables\Voting\Ballots\BallotsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('voting.ballots.index', $this->handle(auth()->id()));
    }

    public function handle(int $userId)
    {
        $election = cache()->get("elections.selected.{$userId}");

        return [
            'ballots' => BallotsTable::make(['electionId' => $election['id'] ?? null]),
        ];
    }
}
