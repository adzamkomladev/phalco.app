<?php

namespace App\Actions\Voting\PollingStations;

use App\Imports\Voting\PollingStationsImport;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Upload
{
    use AsAction;

    public function rules(): array
    {
        return [
            'election_id' => ['required', 'int', 'exists:elections,id'],
            'upload_file' => ['required', 'string'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $this->handle($request->user()->selected_organization_id, $request->validated());

            return redirect()->route('voting.polling-stations.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(int $organizationId, array $data): void
    {
        (new PollingStationsImport($data['election_id'], $organizationId))
            ->queue($data['upload_file'], 'contabo')
            ->allOnQueue('imports');
    }
}
