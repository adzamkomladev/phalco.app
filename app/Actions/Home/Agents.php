<?php

namespace App\Actions\Home;

use App\Actions\Voting\Requests\Index;
use App\Data\Agents\RequestData;
use App\Models\Ballot;
use App\Models\VoteEntryRequest;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

class Agents
{
    use AsAction;

    public function asController()
    {
        return hybridly('home.agents.index', $this->handle(auth()->id()));
    }

    public function handle(int $userId)
    {
        [
            $election,
            $pollingStation
        ] = Octane::concurrently([
            fn () => cache()->get("elections.selected.{$userId}"),
            fn () => cache()->get("agentPollingStation.selected.{$userId}"),
        ]);

        [
            'submitted' => $submitted,
            'pending' => $pending,
        ] = Index::run($userId, $election['id'], $pollingStation['id']);

        $submitted = collect($submitted)
            ->map(fn (VoteEntryRequest $request) => RequestData::from([
                'id' => $request->id,
                'position' => $request->ballot->position,
                'description' => $request->ballot->description,
                'status' => $request->status,
                'created_at' => $request->created_at,
            ]));

        $pending = collect($pending)
            ->map(fn (Ballot $ballot) => RequestData::from([
                'id' => $ballot->id,
                'position' => $ballot->position,
                'description' => $ballot->description,
                'status' => 'not_started',
                'created_at' => null,
            ]));

        $requests = $submitted->merge($pending);

        return [
            'requests' => $requests,
        ];
    }
}
