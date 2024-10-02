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
            'upload_file' => ['required', 'string', 'url'],
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
            ->queue($this->getFilePath($data['upload_file']))
            ->allOnQueue('imports');
    }

    private function removeDomain(string $url): string
    {
        $parsedUrl = parse_url($url);

        if ($parsedUrl === false) {
            throw new \Exception('Could not parse URL');
        }

        return $parsedUrl['path'];
    }

    private function getFilePath(string $url): string
    {
        $path = $this->removeDomain($url);

        return str_replace('/storage/', '', $path);
    }
}
