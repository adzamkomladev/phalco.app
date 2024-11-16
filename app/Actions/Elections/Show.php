<?php

namespace App\Actions\Elections;

use App\Models\Election;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('elections.selected', $this->handle($id));
    }

    public function handle(int $electionId)
    {
        return [
            'election' => Election::with([
                'stages:id,election_id,stage,start,end,reason',
                'createdBy:id,first_name,last_name,email,avatar'
            ])
                ->withCount('voters')
                ->find($electionId),
            'stats' => [
                'voters' => [
                    'total' => 0,
                    'voted' => 0,
                ],
                'nominations' => [
                    'submitted' => 0,
                    'approved' => 0
                ],
                'pollingStations' => [
                    'total' => 0,
                    'active' => 0
                ],
                'campaigns' => [
                    'total' => 0,
                    'active' => 0
                ]
            ],
        ];
    }
}
