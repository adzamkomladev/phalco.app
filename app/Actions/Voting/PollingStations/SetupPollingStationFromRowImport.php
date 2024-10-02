<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\PollingStation;
use Lorisleiva\Actions\Concerns\AsAction;

class SetupPollingStationFromRowImport
{
    use AsAction;

    public string $jobQueue = 'imports';

    public function asJob(int $electionId, int $organizationId, array $row): void
    {
        $this->handle($electionId, $organizationId, $row);
    }

    public function handle(int $electionId, int $organizationId, array $row)
    {

        ['name' => $name, 'code' => $code] = $row;

        if ($code && $name) {
            $exists = PollingStation::where('code', $code)
                ->where('election_id', $electionId)
                ->where('organization_id', $organizationId)
                ->exists();

            if ($exists) {
                return;
            }
        } else {
            return;
        }

        PollingStation::create([
            'name' => $name,
            'code' => $code,
            'election_id' => $electionId,
            'organization_id' => $organizationId,
        ]);
    }
}
