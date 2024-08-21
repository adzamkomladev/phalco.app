<?php

namespace App\Actions\Settings\Team;

use App\Models\OrganizationInvitation;
use App\Tables\Team\MembersTable;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;
use Illuminate\Support\Str;


class Index
{
    use AsAction;

    public function asController()
    {
        return view('settings.team.index', [
            'members' => MembersTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
