<?php

namespace App\Http\Middleware;

use App\Data\Elections\ElectionData;
use App\Data\Elections\ElectionDetailsData;
use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use App\Data\Voting\PollingStations\PollingStationData;
use App\Models\Election;
use App\Models\PollingStation;
use Hybridly\Http\Middleware;
use Laravel\Octane\Facades\Octane;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        $user = auth()->user();
        $user?->load(['memberOrganizations']);
        $selectedOrganizationId = $user?->selected_organization_id;
        $userId = $user?->id;

        [$elections, $election] = Octane::concurrently([
            fn() => Election::select(['id', 'name', 'logo'])
                ->where('organization_id', $selectedOrganizationId)
                ->where('status', 'active')
                ->get(),
            fn() => cache()->get("elections.selected.{$userId}"),
        ]);

        $pollingStation = null;
        if ($election) {
            $pollingStation = PollingStation::where('election_id', $election['id'])
                ->where('organization_id', $selectedOrganizationId)
                ->where('user_id', $userId)
                ->first();
        }

        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional($user),
            ]),
            'elections' => ElectionDetailsData::from([
                'all' => ElectionData::collect($elections),
                'selected' => ElectionData::optional($election),
                'agentPollingStation' => PollingStationData::optional($pollingStation),
            ]),
        ]);
    }
}
