<?php

namespace App\Actions\Voting\PollingStations;

use App\Models\PollingStation;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'election_id' => ['required', 'int', 'exists:elections,id'],
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('polling_stations', 'code')
                    ->where(
                        fn(Builder $query) => $query
                            ->where('election_id', request()->input('election_id'))
                            ->where('organization_id', request()->user()->selected_organization_id)
                    ),
            ],
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

    public function handle(int $organizationId, array $data)
    {
        return PollingStation::create([
            'name' => $data['name'],
            'code' => $data['code'],
            'election_id' => $data['election_id'],
            'organization_id' => $organizationId,
        ]);
    }
}
