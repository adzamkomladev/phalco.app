<?php

namespace App\Actions\Agents;

use App\Models\Election;
use App\Models\PollingStation;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginSetup
{
    use AsAction;

    public function handle(int $userId, int $organizationId)
    {
        $election = cache()->get("elections.selected.{$userId}");

        if (!$election) {
            $retrievedElection = Election::select(['id', 'name', 'logo', 'end'])
                ->whereRelation('organization.organizationMemberships', 'user_id', $userId)
                ->where('organization_id', $organizationId)
                ->where('status', 'active')
                ->first();

            $election = [
                'id' => $retrievedElection?->id,
                'name' => $retrievedElection?->name,
                'logo' => $retrievedElection?->logo,
                'end' => $retrievedElection?->end,
            ];

            cache()->set("elections.selected.{$userId}", $election);
        }

        $pollingStation = PollingStation::where('election_id', $election['id'])
            ->where('organization_id', $organizationId)
            ->where('user_id', $userId)
            ->first();

        cache()
            ->set("agentPollingStation.selected.{$userId}", [
                'id' => $pollingStation?->id,
                'name' => $pollingStation?->name,
            ]);
    }
}
