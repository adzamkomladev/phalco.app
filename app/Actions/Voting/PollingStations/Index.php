<?php

namespace App\Actions\Voting\PollingStations;

use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function asController()
    {

        return hybridly('voting.polling-stations.index');
    }

    public function handle()
    {
        // ...
    }
}
