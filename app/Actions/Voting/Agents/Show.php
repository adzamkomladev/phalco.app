<?php

namespace App\Actions\Voting\Agents;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('voting.agents.show', [
            'agent' => $this->handle($id),
        ]);
    }

    public function handle(int $agentId)
    {
        return User::find($agentId);
    }
}
