<?php

namespace App\Actions\Elections;

use App\Models\BallotOption;
use App\Models\Election;
use App\Models\ElectionStage;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Concurrency;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('elections.show', $this->handle(auth()->id(), $id));
    }

    public function handle(int $userId, int $electionId)
    {
        $election = Election::with([
            'stages:id,election_id,stage,start,end',
            'createdBy:id,selected_organization_id,first_name,last_name,email,avatar',
            'organization'
        ])
            ->withCount([
                'voters as voters',
                'voters as voters_voted' => fn(Builder $query) => $query->whereRelation('votes.ballot', 'election_id', $electionId),
                'pollingStations as polling_stations',
                'pollingStations as active_polling_stations' => fn(Builder $query) => $query->where('status', 'active'),
            ])
            ->find($electionId);

        $stage = $election->stages->first(
            fn(ElectionStage $value) => $value->start < now() && $value->end >= now(),
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
            $election->loadCount(['ballots as ballots']);
            $stageStats = [
                'voters' => $election->voters,
                'pollingStations' => $election->polling_stations,
                'ballots' => $election->ballots,
                'candidates' => BallotOption::whereRelation('ballot', 'election_id', $electionId)->count(),
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
                        'id' => $userId,
                        'name' => 'Kofi Gyan',
                        'avatar' => 'https:://via.placeholder.com/150',
                    ],
                ],
            ];
        } else {
            $organization = $election->organization;

            [
                $main,
                $nominations,
                $donations
            ] = Concurrency::run([
                fn() => ($organization->balanceInt ?? 0) / 100,

                fn() => ($organization->getWallet('nominations')?->balanceInt ?? 0) / 100,
                fn() => ($organization->getWallet('donations')?->balanceInt ?? 0) / 100,
            ]);

            $stageStats = [
                'totalBalance' => $main + $nominations + $donations,
                'totalDonations' => $donations,
                'totalNominations' => 0,
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
                    'total' => $election->voters,
                    'voted' => $election->voters_voted,
                ],
                'nominations' => [
                    'submitted' => 230,
                    'approved' => 10,
                ],
                'pollingStations' => [
                    'total' => $election->polling_stations,
                    'active' => $election->active_polling_stations,
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
