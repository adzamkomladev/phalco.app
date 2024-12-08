<?php

namespace App\Actions\Voting\Ballots;

use App\Models\Ballot;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        $ballot = $this->handle($id);

        return hybridly('voting.ballots.show', ['ballot' => $ballot]);
    }

    public function handle(int $ballotId)
    {
        return Ballot::with(['options:id,ballot_id,order,name,avatar,party,party_image'])->find($ballotId);
    }
}
