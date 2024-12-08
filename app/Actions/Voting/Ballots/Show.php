<?php

namespace App\Actions\Voting\Ballots;

use App\Models\Ballot;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Lorisleiva\Actions\Concerns\AsAction;


class Show
{
    use AsAction;

    public function asController(int $id)
    {
        $ballot = $this->handle($id);

        return hybridly('voting.ballots.show', ['ballot' => $ballot]);
    }

    public function handle(int $ballotId): Ballot
    {
        return Ballot::select(['id', 'election_id', 'position', 'description', 'code', 'status'])
        ->with([
            'options' => fn(Builder $query) => $query
                ->select(['id', 'ballot_id', 'order', 'name', 'avatar', 'party', 'party_image'])
                ->withCount('votes as votes')
                ->orderBy('order', 'asc'),
        ])->find($ballotId);
    }
}
