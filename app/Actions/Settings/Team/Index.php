<?php

namespace App\Actions\Settings\Team;

use App\Tables\Team\MembersTable;
use Lorisleiva\Actions\Concerns\AsAction;
use function Hybridly\view;


class Index
{
    use AsAction;

    public function asController()
    {
        return view('settings.team', [
            'members' => MembersTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
