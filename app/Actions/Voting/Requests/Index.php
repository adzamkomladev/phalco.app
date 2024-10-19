<?php

namespace App\Actions\Voting\Requests;

use App\Models\Ballot;
use App\Models\VoteEntryRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {
        return hybridly(
            'voting.requests.index',
            $this->handle(
                auth()->id(),
                request()->input('election_id'),
                request()->input('polling_station_id')
            )
        );
    }

    public function handle(int $userId, int $electionId, int $pollingStationId)
    {
        $submitted = VoteEntryRequest::with(['ballot:id,position,description'])
            ->select(['id', 'polling_station_id', 'user_id', 'ballot_id', 'status'])
            ->where('polling_station_id', $pollingStationId)
            ->where('user_id', $userId)
            ->get();

        $ballotIdsToIgnore = $submitted->pluck('ballot_id')->toArray();

        $pending = Ballot::select(['id', 'election_id', 'position', 'description'])
            ->where('election_id', $electionId)
            ->whereNotIn('id', $ballotIdsToIgnore)
            ->get();

        return [
            'pending' => $pending,
            'submitted' => $submitted,
        ];
    }
}
