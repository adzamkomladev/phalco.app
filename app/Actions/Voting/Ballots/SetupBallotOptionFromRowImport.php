<?php

namespace App\Actions\Voting\Ballots;

use App\Models\BallotOption;
use Lorisleiva\Actions\Concerns\AsAction;

class SetupBallotOptionFromRowImport
{
    use AsAction;

    public string $jobQueue = 'imports';

    public function asJob(int $ballotId, array $row): void
    {
        $this->handle($ballotId, $row);
    }

    public function handle(int $ballotId, array $row)
    {
        [
            'order' => $order,
            'name' => $name
        ] = $row;

        BallotOption::create([
            'ballot_id' => $ballotId,
            'order' => $order,
            'name' => $name,
            'status' => 'enabled',
        ]);
    }
}
