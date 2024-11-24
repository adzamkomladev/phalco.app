<?php

namespace App\Actions\Elections;

use App\Events\Elections\ElectionCreated;
use App\Models\Election;
use App\Models\ElectionActivity;
use App\Models\ElectionStage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
        $stages = collect($data['stages'])->sortBy('start');
        $stage = $stages->first();
        $data['logo'] = app()->isProduction() ? Storage::url($data['logo']) : asset("storage/{$data['logo']}");

        $election = Election::create([
            'name' => $data['name'],
            'logo' => $data['logo'],
            'description' => $data['description'],
            'start' => Carbon::parse($data['start']),
            'end' => Carbon::parse($data['end']),
            'organization_id' => $organizationId,
            'user_id' => $userId,
            'status' => 'active',
            'stage' => $stage['name'],
        ]);

        $electionId = $election->id;

        $stagesToBeCreated = $stages
            ->map(fn ($stage) => [
                'election_id' => $electionId,
                'stage' => $stage['name'],
                'start' => Carbon::parse($stage['start']),
                'end' => Carbon::parse($stage['end']),
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ])
            ->toArray();

        Octane::concurrently([fn () => ElectionActivity::create([
            'election_id' => $electionId,
            'status' => 'active',
            'user_id' => $userId,
            'reason' => 'Create new election',
        ]),
            fn () => ElectionStage::insert($stagesToBeCreated),
        ]);

        ElectionCreated::dispatch($election->id);

        return $election;
    }
}
