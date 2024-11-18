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
                'total' => 20,
                'approved' => 10,
                'successful' => 10,
                'totalSpent' => 2000,
                'pending' => 0,
            ];
        } elseif ($stage?->stage === 'voting') {
            $stageStats = [
                'voters' => 3000,
                'pollingStations' => 230,
                'ballots' => 200,
                'candidates' => 10,
            ];
        } elseif ($stage?->stage === 'campaigns') {
            $stageStats = [
                'campaigns' => 10,
                'audiences' => 40,
                'message' => [
                    'id' => 1,
                    'text' => 'Hello world',
                    'sender' => 'Phalco',
                    'sentBy' => [
                        'id' => auth()->id(),
                        'name' => 'Kofi Gyan',
                        'avatar' => 'https:://via.placeholder.com/150',
                    ],
                ],
            ];
        } else {
            $stageStats = [
                'totalBalance' => 4000,
                'totalDonations' => 2300,
                'totalNominations' => 20,
                'spent' => [
                    'jan' => 0,
                    'feb' => 110,
                    'mar' => 0,
                    'apr' => 230,
                    'may' => 70,
                    'jun' => 0,
                    'jul' => 90,
                    'aug' => 0,
                    'sep' => 560,
                    'oct' => 0,
                    'nov' => 450,
                    'dec' => 0,
                ],
            ];
        }

        return [
            'election' => $election,
            'stats' => [
                'voters' => [
                    'total' => 20,
                    'voted' => 10,
                ],
                'nominations' => [
                    'submitted' => 230,
                    'approved' => 10,
                ],
                'pollingStations' => [
                    'total' => 230,
                    'active' => 220,
                ],
                'campaigns' => [
                    'total' => 20,
                    'active' => 3,
                ],
            ],
            'stage' => $stage,
            'stageStats' => $stageStats,
        ];
    }
}
