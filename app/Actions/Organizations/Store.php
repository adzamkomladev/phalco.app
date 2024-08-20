<?php

namespace App\Actions\Organizations;

use App\Models\OrganizationMembership;
use App\Models\User;
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
            'description' => ['nullable', 'string', 'max:255'],
            'logo' => ['required', 'string', 'url'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $this->handle($request->user(), $request->validated());
            return redirect()->route('home');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(User $user, array $data)
    {
        $organization = $user->organizationsOwned()->create($data);
        $user->selectOrganization($organization->id)
            ->organizationMemberships()
            ->create([
                'organization_id' => $organization->id,
                'role' => 'owner',
                'status' => 'active',
            ]);
    }
}
