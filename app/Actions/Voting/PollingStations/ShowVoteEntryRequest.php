<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\VoteEntryRequest;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class ShowVoteEntryRequest
{
    use AsAction;

    public function asController(int $id, int $voteEntryRequestId)
    {
        $voteEntryRequest = $this->handle($voteEntryRequestId);

        return view('voting.requests.show', [
            'voteEntryRequest' => $voteEntryRequest,
        ])->base('voting.polling-stations.show', [
            'id' => $id,
        ]);
    }

    public function handle(int $voteEntryRequestId)
    {
        return VoteEntryRequest::with(['entries', 'histories', 'ballot', 'files'])
            ->find($voteEntryRequestId);
    }
}
