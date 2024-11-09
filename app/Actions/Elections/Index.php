<?php

namespace App\Actions\Elections;

use App\Tables\Elections\ElectionsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('elections.index', [
            'elections' => ElectionsTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
