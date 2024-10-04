<?php

namespace App\Actions\Voting\Agents;

use App\Tables\Voting\Agents\AgentsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('voting.agents.index', [
            'agents' => AgentsTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
