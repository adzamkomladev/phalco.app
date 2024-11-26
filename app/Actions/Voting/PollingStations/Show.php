<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\PollingStation;
use App\Tables\Voting\PollingStations\RequestsTable;
use App\Tables\Voting\PollingStations\VotersTable;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('voting.polling-stations.show', $this->handle($id));
    }

    public function handle(int $pollingStationId)
    {
        return [
            'voters' => VotersTable::make(['pollingStationId' => $pollingStationId]),
            'requests' => RequestsTable::make(['pollingStationId' => $pollingStationId]),
            'pollingStation' => PollingStation::select(['id', 'name', 'code', 'agent_id'])
            ->with(['agent:id,first_name,last_name,email,avatar'])
            ->find($pollingStationId)
        ];
    }
}
