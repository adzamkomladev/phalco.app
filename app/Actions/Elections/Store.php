<?php

namespace App\Actions\Elections;

use App\Events\Elections\ElectionCreated;
use App\Models\Election;
use App\Models\ElectionActivity;
use App\Models\ElectionStage;
use Carbon\Carbon;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'logo' => ['required', 'url'],
            'description' => ['nullable', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'stage' => ['required', 'string', 'in:campaigns,nominations'],
            'stages' => ['required', 'array'],
            'stages.*.name' => ['required', 'string'],
            'stages.*.start' => ['required', 'date'],
            'stages.*.end' => ['required', 'date'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $election = $this->handle($request->user()->id, $request->user()->selected_organization_id, $request->validated());

        return redirect()->route('elections.show', ['id' => $election->id]);
    }

    public function handle(int $userId, int $organizationId, array $data)
    {
        $election = Election::create([
            'name' => $data['name'],
            'logo' => $data['logo'],
            'description' => $data['description'],
            'start' => Carbon::parse($data['start']),
            'end' => Carbon::parse($data['end']),
            'organization_id' => $organizationId,
            'user_id' => $userId,
            'status' => 'active',
            'stage' => $data['stage'],
        ]);

        $electionId = $election->id;

        Octane::concurrently([
            fn () => ElectionActivity::create([
                'election_id' => $electionId,
                'status' => 'active',
                'user_id' => $userId,
                'reason' => 'Create new election',
            ]),
            fn () => ElectionStage::create([
                'election_id' => $electionId,
                'stage' => $data['stage'],
                'user_id' => $userId,
                'reason' => 'Create new election for campaigns',
            ]),
        ]);

        ElectionCreated::dispatch($election->id);

        return $election;
    }
}
