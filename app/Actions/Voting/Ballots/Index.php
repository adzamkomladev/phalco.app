<?php

namespace App\Actions\Voting\Ballots;

use App\Models\Ballot;
use App\Models\BallotOption;
use App\Models\PollingStation;
use App\Models\Vote;
use App\Tables\Voting\Ballots\BallotsTable;
use Laravel\Octane\Facades\Octane;
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
        $electionId = $election['id'] ?? null;

        [
            $totalCandidates,
            $totalVotes,
            $enabledBallots,
            $totalPollingStations
        ] = Octane::concurrently([
            fn() => BallotOption::whereRelation('ballot', 'election_id', $electionId)->count(),
            fn() => Vote::whereRelation('ballot', 'election_id', $electionId)->count(),
            fn() => Ballot::where('election_id', $electionId)->where('status', 'enabled')->count(),
            fn() => PollingStation::where('election_id', $electionId)->count()
        ]);

        return [
            'ballots' => BallotsTable::make(['electionId' => $election['id'] ?? null]),
            'stats' => [
                [
                    'description' => 'Total Candidates',
                    'value' => $totalCandidates,
                ],
                [
                    'description' => 'Total Votes',
                    'value' => $totalVotes,
                ],
                [
                    'description' => 'Enabled Ballots',
                    'value' => $enabledBallots,
                ],
                [
                    'description' => 'Polling Stations',
                    'value' => $totalPollingStations,
                ],
            ],
        ];
    }
}
