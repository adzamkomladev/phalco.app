<?php

namespace App\Actions\Voting\Requests;

use App\Models\VoteEntryRequest;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Show
{
    use AsAction;

    // public function asController(int $id)
    public function asController()
    {
        // $voteEntryRequest = $this->handle($id);

        return view('voting.requests.show'
            // ,
            //  [
            //     'voteEntryRequest' => $voteEntryRequest,
            // ])->base('voting.requests.index', [
            //     'election_id' => $voteEntryRequest?->election_id,
            //     'polling_station_id' => $voteEntryRequest?->polling_station_id,
            // ]
        );
    }

    // public function handle(int $voteEntryRequestId)
    // {
    //     return VoteEntryRequest::with(['entries', 'histories', 'ballot', 'files'])
    //         ->find($voteEntryRequestId);
    // }
}
