<?php

namespace App\Actions\Voting\Ballots;

use App\Imports\Voting\BallotOptionsImport;
use App\Models\Ballot;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'position' => ['required', 'max:150'],
            'description' => ['nullable', 'string'],
            'election_id' => ['required', 'int', 'exists:elections,id'],
            'upload_file' => ['nullable', 'string', 'url'],
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('ballots', 'code')
                    ->where(
                        fn (Builder $query) => $query
                            ->where('election_id', request()->input('election_id'))
                    ),
            ],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $ballot = $this->handle($request->validated());

            return redirect()->route('voting.ballots.show', ['id' => $ballot->id]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(array $data)
    {
        $ballot = Ballot::create([
            'position' => $data['position'],
            'code' => $data['code'],
            'description' => $data['description'],
            'election_id' => $data['election_id'],
            'status' => 'enabled',
        ]);

        if ($data['upload_file']) {
            (new BallotOptionsImport($ballot->id))
                ->queue($this->getFilePath($data['upload_file']))
                ->allOnQueue('imports');
        }

        return $ballot;
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
