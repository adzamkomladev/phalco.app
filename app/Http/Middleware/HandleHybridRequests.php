<?php

namespace App\Http\Middleware;

use App\Data\ElectionData;
use App\Data\ElectionDetailsData;
use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use App\Models\Election;
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
            fn() => Election::where('organization', $selectedOrganizationId)
                ->where('status', 'active')
                ->get(),
            fn() => cache()->get("elections.selected.{$userId}"),
        ]);

        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional($user),
            ]),
            'elections' => ElectionDetailsData::from([
                'all' => ElectionData::collect($elections),
                'selected' => ElectionData::optional($election),
            ])
        ]);
    }
}
