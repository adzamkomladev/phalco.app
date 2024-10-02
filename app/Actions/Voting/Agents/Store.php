<?php

namespace App\Actions\Voting\Agents;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
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

    public function handle(int $organizationId, array $data)
    {
        SetupAgentFromRowImport::dispatch(0, $organizationId, $data);
    }
}
