<?php

namespace App\Actions\Elections;

use App\Events\Elections\ElectionCreated;
use App\Models\Election;
use Carbon\Carbon;
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
        ];
    }
    public function asController(ActionRequest $request)
    {
        $election = $this->handle($request->user()->id, $request->user()->selected_organization_id, $request->validated());

        return redirect()->route('elections.index');
    }


    public function handle(int $userId, int $organizationId, array $data)
    {
        $election = Election::create([
            'name' => $data['name'],
            'logo' => $data['logo'],
            'description' => $data['description'],
            'start' =>  Carbon::parse($data['start']),
            'end' =>  Carbon::parse($data['end']),
            'organization_id' => $organizationId,
            'user_id' => $userId,
            'status' => 'active'
        ]);

        $election->activities()->create([
            'status' => 'active',
            'user_id' => $userId,
            'reason' => 'Create new election'
        ]);

        ElectionCreated::dispatch($election->id);

        return $election;
    }
}
