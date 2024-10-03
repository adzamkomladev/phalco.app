<?php

namespace App\Http\Middleware;

use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use Hybridly\Http\Middleware;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        $user = auth()->user();
        $user?->load(['memberOrganizations']);

        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional($user),
            ]),
        ]);
    }
}
