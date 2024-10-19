<?php

namespace App\Actions\Voting\Requests;

use App\Models\VoteEntryRequest;
use App\Models\VoteEntryRequestHistory;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Confirm
{
    use AsAction;

    public function rules(): array
    {
        return [
            'vote_entry_request_id' => ['required', 'int', 'exists:vote_entry_requests,id'],
            'comment' => ['required', 'string'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $this->handle(auth()->id(), $request->validated());

            return redirect()->back()->with('success', 'Request confirmed!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function handle(int $userId, array $data)
    {
        [
            'vote_entry_request_id' => $voteEntryRequestId,
            'comment' => $comment
        ] = $data;

        Octane::concurrently([
            fn() => VoteEntryRequest::whereId($voteEntryRequestId)->update(['status' => 'confirmed']),
            fn() => VoteEntryRequestHistory::where('vote_entry_request_id', $voteEntryRequestId)
                ->where('ended_at', null)
                ->update(['ended_at' => now()]),
            fn() => VoteEntryRequestHistory::create([
                'vote_entry_request_id' => $voteEntryRequestId,
                'user_id' => $userId,
                'status' => 'confirmed',
                'comment' => $comment,
            ])
        ]);

        // TODO: Start processing vote in queue
    }
}
