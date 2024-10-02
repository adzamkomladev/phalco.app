<?php

namespace App\Actions\Voting\Agents;

use App\Models\Election;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;


class Create
{
    use AsAction;

    public function asController()
    {
        $elections = $this->handle(request()->user()->selected_organization_id);
        return view('voting.agents.create', ['elections' => $elections])
            ->base('voting.agents.index');
    }

    public function handle(int $organizationId)
    {
        return Election::select(['id', 'name'])->where('organization_id', $organizationId)->get();
    }
}
