<?php

namespace App\Actions\Elections;

use App\Models\Election;
use App\Models\ElectionStage;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('elections.show', $this->handle($id));
    }

    public function handle(int $electionId)
    {
        $election = Election::with([
            'stages:id,election_id,stage,start,end',
            'createdBy:id,selected_organization_id,first_name,last_name,email,avatar',
        ])->withCount('voters')
            ->find($electionId);

        $stage = $election->stages->first(
            fn(ElectionStage $value, int $key) => $value->start < now() && $value->end >= now(),
        );

        $stageStats = null;

        if ($stage?->stage === 'nominations') {
            $stageStats = [
                'total' => 0,
                'approved' => 0,
                'successful' => 0,
                'totalSpent' => 2000,
                'pending' => 0,
            ];
        } else if ($stage?->stage === 'voting') {
            $stageStats = [
                'voters' => 0,
                'pollingStations' => 0,
                'ballots' => 0,
                'candidates' => 0
            ];
        } else if ($stage?->stage === 'campaigns') {
            $stageStats = [
                'campaigns' => 0,
                'audiences' => 0,
                'message' => [
                    'id' => 1,
                    'text' => 'Hello world',
                    'sender' => 'Phalco',
                    'sentBy' => [
                        'id' => auth()->id(),
                        'name' => 'Kofi Gyan',
                        'avatar' => 'https:://via.placeholder.com/150'
                    ]
                ]
            ];
        } else {
            $stageStats = [
                'totalBalance' => 0,
                'totalDonations' => 0,
                'totalNominations' => 0,
                'spent' => [
                    'jan' => 0,
                    'feb' => 0,
                    'mar' => 0,
                    'apr' => 0,
                    'may' => 0,
                    'jun' => 0,
                    'jul' => 0,
                    'aug' => 0,
                    'sep' => 0,
                    'oct' => 0,
                    'nov' => 0,
                    'dec' => 0
                ]
            ];
        }


        return [
            'election' => $election,
            'stats' => [
                'voters' => [
                    'total' => 0,
                    'voted' => 0,
                ],
                'nominations' => [
                    'submitted' => 0,
                    'approved' => 0,
                ],
                'pollingStations' => [
                    'total' => 0,
                    'active' => 0,
                ],
                'campaigns' => [
                    'total' => 0,
                    'active' => 0,
                ],
            ],
            'stage' => $stage,
            'stageStats' => $stageStats
        ];
    }
}
