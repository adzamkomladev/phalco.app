<?php

namespace App\Actions\Home;

use App\Actions\Voting\Requests\Index;
use App\Models\Ballot;
use App\Models\VoteEntryRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Agents
{
    use AsAction;

    public function asController()
    {
        return hybridly('home.agents');
    }

    public function handle()
    {
        [
            'submitted' => $submitted,
            'pending' => $pending,
        ] =  Index::run(56, 5, 2);

        $submitted = collect($submitted)
            ->map(fn(VoteEntryRequest $request) => [
                'id' => $request->id,
                'position' => $request->ballot->position,
                'description' => $request->ballot->description,
                'status' => $request->status,
                'created_at' => $request->created_at,
            ]);

        $pending = collect($pending)
            ->map(fn(Ballot $ballot) => [
                'id' => $ballot->id,
                'position' => $ballot->position,
                'description' => $ballot->description,
                'status' => 'not_started',
                'created_at' => null
            ]);

        $requests = $submitted->merge($pending);
        return [
            'requests' => $requests,
            'agents' => [],
        ];
    }
}
