<?php

namespace App\Actions\Voting\Ballots;

use App\Tables\Voting\Ballots\BallotsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('voting.ballots.index', [
            'ballots' => BallotsTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
