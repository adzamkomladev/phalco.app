<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\PollingStation;
use App\Models\VoteEntryRequest;
use App\Models\Voter;
use App\Tables\Voting\PollingStations\PollingStationsTable;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('voting.polling-stations.index', $this->handle(auth()->id()));
    }

    public function handle(int $userId)
    {
        $election = cache()->get("elections.selected.{$userId}");

        $electionId = $election['id'] ?? null;
        [
            $totalPollingStations,
            $totalVoters,
            $totalAssignedPollingStations,
            $voteRequests,
            $popularPollingStations
        ] = Octane::concurrently([
            fn() => PollingStation::where('election_id', $electionId)->count(),
            fn() => Voter::where('election_id', $electionId)->count(),
            fn() => PollingStation::where('election_id', $electionId)->whereNotNull('user_id')->count(),
            fn() => VoteEntryRequest::where('election_id', $electionId)->count(),
            fn() => PollingStation::withCount('votes')
                ->where('election_id', $electionId)
                ->orderBy('votes_count', 'desc')
                ->limit(4)
                ->get()
                ->map(fn(PollingStation $pollingStation) => [
                    'id' => $pollingStation->id,
                    'name' => $pollingStation->name,
                    'votes' => $pollingStation->votes_count
                ])
        ]);

        return [
            'pollingStations' => PollingStationsTable::make(['electionId' => $electionId]),
            'popularPollingStations' => $popularPollingStations,
            'stats' => [
                [
                    'description' => 'Total Polling Stations',
                    'value' => $totalPollingStations,
                ],
                [
                    'description' => 'Total Voters',
                    'value' => $totalVoters,
                ],
                [
                    'description' => 'Total Assigned Polling Stations',
                    'value' => $totalAssignedPollingStations,
                ],
                [
                    'description' => 'Vote Requests',
                    'value' => $voteRequests,
                ]
            ]
        ];
    }
}
