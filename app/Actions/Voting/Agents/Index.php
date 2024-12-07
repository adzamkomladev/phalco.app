<?php

namespace App\Actions\Voting\Agents;

use App\Models\OrganizationMembership;
use App\Models\OrganizationRole;
use App\Models\PollingStation;
use App\Tables\Voting\Agents\AgentsTable;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('voting.agents.index', $this->handle(auth()->id(), request()->user()->selected_organization_id));
    }

    public function handle(int $userId, int $organizationId)
    {
        [$role, $election] = Octane::concurrently([
            fn() => OrganizationRole::where('organization_id', $organizationId)
                ->where('name', 'agent')
                ->first(),
            fn() => cache()->get("elections.selected.{$userId}")
        ]);

        $electionId = $election['id'] ?? null;
        $roleId = $role?->id;

        [
            $totalAgents,
            $totalAssignedPollingStations,
            $totalPollingStations
        ] = Octane::concurrently([
            fn() => OrganizationMembership::where('organization_id', $organizationId)
                ->where('organization_role_id', $roleId)
                ->count(),
            fn() => PollingStation::where('organization_id', $organizationId)
                ->where('election_id', $electionId)
                ->whereNotNull('user_id')
                ->count(),
            fn() => PollingStation::where('organization_id', $organizationId)
                ->where('election_id', $electionId)
                ->count(),
        ]);

        return [
            'agents' => AgentsTable::make([
                'organizationId' => $organizationId,
                'electionId' => $electionId,
                'roleId' => $role?->id
            ]),
            'stats' => [
                [
                    'description' => 'Total Agents',
                    'value' => $totalAgents,
                ],
                [
                    'description' => 'Total Unassigned agents',
                    'value' => $totalAgents - $totalAssignedPollingStations,
                ],
                [
                    'description' => 'Total Assigned Polling Stations',
                    'value' => $totalAssignedPollingStations,
                ],
                [
                    'description' => 'Polling Stations',
                    'value' => $totalPollingStations,
                ],
            ],
        ];
    }
}
