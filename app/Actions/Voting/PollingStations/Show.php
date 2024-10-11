<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\PollingStation;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('voting.polling-stations.show', [
            'pollingStation' => $this->handle($id),
        ]);
    }

    public function handle(int $pollingStationId)
    {
        return PollingStation::with(['election', 'agent', 'voters'])
            ->withCount(['votes'])
            ->find($pollingStationId);
    }
}
