<?php

namespace App\Actions\Voting\Agents;

use App\Imports\Voting\AgentsImport;
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

            return redirect()->route('voting.agents.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(int $organizationId, array $data): void
    {
        (new AgentsImport($data['election_id'], $organizationId))
            ->queue($data['upload_file'], 'contabo')
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
        if (app()->environment('production')) {
            return $url;
        }

        $path = $this->removeDomain($url);

        return str_replace('/storage/', '', $path);
    }
}
