<?php

namespace App\Actions\Elections;

use App\Data\CardStatData;
use App\Models\Audience;
use App\Models\BallotOption;
use App\Models\Campaign;
use App\Models\Election;
use App\Models\ElectionStage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Concurrency;
use Laravel\Octane\Facades\Octane;
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
        [
            $election,
            $audiences,
            $campaign
        ] = Octane::concurrently([
            fn () => Election::with([
                'stages:id,election_id,stage,start,end',
                'createdBy:id,selected_organization_id,first_name,last_name,email,avatar',
                'organization',
            ])
                ->withCount([
                    'campaigns as campaigns',
                    'campaigns as active_campaigns' => fn (Builder $query) => $query->whereIn('status', ['pending', 'processing', 'paused']),
                    'voters as voters',
                    'voters as voters_voted' => fn (Builder $query) => $query->whereRelation('votes.ballot', 'election_id', $electionId),
                    'pollingStations as polling_stations',
                    'pollingStations as active_polling_stations' => fn (Builder $query) => $query->where('status', 'active'),
                ])
                ->find($electionId),
            fn () => Audience::whereRelation('campaigns', 'election_id', $electionId)->count(),
            fn () => Campaign::select(['id', 'user_id', 'election_id', 'data'])->with('createdBy:id,first_name,last_name,avatar')->where('election_id', $electionId)->latest()->first(),
        ]);

        $stage = $election->stages->first(
            fn (ElectionStage $value) => $value->start < now() && $value->end >= now(),
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
                'campaigns' => $election->campaigns,
                'audiences' => $audiences,
                'message' => [
                    'id' => $campaign->id,
                    'text' => $campaign->data['message'],
                    'sender' => $campaign->data['sender'],
                    'sentBy' => [
                        'id' => $campaign->user_id,
                        'name' => $campaign->createdBy->name,
                        'avatar' => $campaign->createdBy->avatar,
                    ],
                ],
            ];
        } else {
            $organization = $election->organization;

            [
                $main,
                $nominations,
                $donations
            ] = Concurrency::run([fn () => ($organization->balanceInt ?? 0) / 100,
                fn () => ($organization->getWallet('nominations')?->balanceInt ?? 0) / 100,
                fn () => ($organization->getWallet('donations')?->balanceInt ?? 0) / 100,
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
            'stats' => CardStatData::collect([
                [
                    'title' => 'Voters',
                    'icon' => 'thumb_up',
                    'stats' => [
                        [
                            'title' => 'Total',
                            'value' => $election->voters,
                        ],
                        [
                            'title' => 'Voted',
                            'value' => $election->voters_voted,
                        ],
                    ],
                ],
                [
                    'title' => 'Nominations',
                    'icon' => 'users',
                    'stats' => [
                        [
                            'title' => 'Submitted',
                            'value' => 230,
                        ],
                        [
                            'title' => 'Approved',
                            'value' => 10,
                        ],
                    ],
                ],
                [
                    'title' => 'Polling Stations',
                    'icon' => 'polling_station',
                    'stats' => [
                        [
                            'title' => 'Total',
                            'value' => $election->polling_stations,
                        ],
                        [
                            'title' => 'Active',
                            'value' => $election->active_polling_stations,
                        ],
                    ],
                ],
                [
                    'title' => 'Campaigns',
                    'icon' => 'campaign_main',
                    'stats' => [
                        [
                            'title' => 'Total',
                            'value' => $election->campaigns,
                        ],
                        [
                            'title' => 'Active',
                            'value' => $election->active_campaigns,
                        ],
                    ],
                ],
            ]),
            'stage' => $stage,
            'stageStats' => $stageStats,
        ];
    }
}
