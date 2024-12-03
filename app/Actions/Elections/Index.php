<?php

namespace App\Actions\Elections;

use App\Data\Elections\Index\OngoingStatsData;
use App\Data\Elections\Index\StatsData;
use App\Models\Election;
use App\Models\Voter;
use App\Tables\Elections\ElectionsTable;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('elections.index', $this->handle(request()->user()->selected_organization_id));
    }

    public function handle(int $organizationId)
    {
        $ongoingElection = Election::select(['id', 'organization_id', 'status', 'end', 'start'])
            ->where('organization_id', $organizationId)
            ->where('status', 'active')
            ->first();

        if (! $ongoingElection) {
            return [
                'stats' => StatsData::from([
                    'ongoing' => OngoingStatsData::optional(null),
                    'totalSpent' => 0,
                    'totalCampaigns' => 0,
                ]),
                'electionsTable' => ElectionsTable::make(),
            ];
        }

        $dayAgo = now()->subDay()->toDateString();
        $electionId = $ongoingElection->id;

        [
            $totalVotersCurrently,
            $totalVotersOneDayAgo
        ] = Octane::concurrently([fn () => Voter::where('election_id', $electionId)
            ->count(),
            fn () => Voter::where('election_id', $electionId)
                ->whereDate('created_at', '<', $dayAgo)
                ->count(),
        ]);

        $totalVotersChange = $totalVotersCurrently - $totalVotersOneDayAgo;
        $daysLeftToComplete = now()->diffInDays($ongoingElection->end);
        $totalDaysForOngoingElection = $ongoingElection->start->diffInDays($ongoingElection->end);
        $totalDaysSoFarForOngoingElection = $ongoingElection->start->diffInDays(now());

        return [
            'stats' => StatsData::from([
                'ongoing' => OngoingStatsData::from([
                    'totalVoters' => $totalVotersCurrently,
                    'totalVotersChange' => $totalVotersChange,
                    'daysLeft' => $daysLeftToComplete,
                    'completionPercentage' => $totalDaysSoFarForOngoingElection / $totalDaysForOngoingElection * 100,

                ]),
                'totalSpent' => 0,
                'totalCampaigns' => 0,
            ]),
            'electionsTable' => ElectionsTable::make(),
        ];
    }
}
