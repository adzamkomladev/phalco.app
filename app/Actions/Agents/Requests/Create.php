<?php

namespace App\Actions\Agents\Requests;

use App\Models\Ballot;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Create
{
    use AsAction;

    public function asController(int $id)
    {
        return view('agents.requests.create', $this->handle($id))
            ->base('home.agents');
    }

    public function handle(int $id)
    {
        return [
            'ballot' => Ballot::with(['options'])->find($id),
        ];
    }
}
