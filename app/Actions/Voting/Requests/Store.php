<?php

namespace App\Actions\Voting\Requests;

use App\Models\VoteEntry;
use App\Models\VoteEntryFile;
use App\Models\VoteEntryRequest;
use App\Models\VoteEntryRequestHistory;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'ballot_id' => ['required', 'int', 'exists:ballots,id'],
            'election_id' => ['required', 'int', 'exists:elections,id'],
            'polling_station_id' => ['required', 'int', 'exists:polling_stations,id'],
            'comment' => ['nullable', 'string'],
            'upload_file' => ['required', 'string', 'url'],
            'options' => ['required', 'array'],
            'options.*.id' => ['required', 'int', 'exists:ballot_options,id'],
            'options.*.votes' => ['required', 'int', 'min:0'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $this->handle(auth()->id(), $request->validated());

            return redirect()->route('voting.requests.index', [
                'election_id' => $request->input('election_id'),
                'polling_station_id' => $request->input('polling_station_id'),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(int $userId, array $data)
    {
        [
            'options' => $options,
            'upload_file' => $uploadFile,
            'ballot_id' => $ballotId,
            'polling_station_id' => $pollingStationId,
            'election_id' => $electionId,
            'comment' => $comment
        ] = $data;

        $entryRequest = VoteEntryRequest::create([
            'user_id' => $userId,
            'election_id' => $electionId,
            'polling_station_id' => $pollingStationId,
            'ballot_id' => $ballotId,
            'status' => 'pending',
        ]);

        $entryRequestId = $entryRequest->id;
        $entriesData = collect($options)->map(fn (array $option) => [
            'vote_entry_request_id' => $entryRequestId,
            'ballot_option_id' => $option['id'],
            'votes' => $option['votes'],
            'created_at' => now(),
            'updated_at' => now(),
        ])->toArray();

        [$entries, $entryFile, $entryRequestHistory] = Octane::concurrently([
            fn () => VoteEntry::insert($entriesData),
            fn () => VoteEntryFile::create([
                'vote_entry_request_id' => $entryRequestId,
                'url' => $uploadFile,
            ]),
            fn () => VoteEntryRequestHistory::create([
                'vote_entry_request_id' => $entryRequestId,
                'user_id' => $userId,
                'status' => 'pending',
                'comment' => $comment,
            ]),
        ]);
    }
}
