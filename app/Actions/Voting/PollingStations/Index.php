<?php

namespace App\Actions\Voting\PollingStations;

use App\Tables\Voting\PollingStations\PollingStationsTable;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('voting.polling-stations.index', [
            'pollingStations' => PollingStationsTable::make(),
        ]);
    }

    public function handle()
    {
        // ...
    }
}
