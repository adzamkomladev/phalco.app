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
        return Ballot::with(['election', 'options'])->find($ballotId);
    }
}
