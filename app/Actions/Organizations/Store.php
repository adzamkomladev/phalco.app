<?php

namespace App\Actions\Organizations;

use App\Actions\Finance\SetupOrganizationWallets;
use App\Models\OrganizationMembership;
use App\Models\OrganizationRole;
use App\Models\User;
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
            'description' => ['nullable', 'string', 'max:255'],
            'logo' => ['required', 'string'],
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
        $userId = $user->id;

        $data['logo'] = app()->isProduction() ? Storage::url($data['logo']) : asset("storage/{$data['logo']}");
        $organization = $user->organizationsOwned()->create($data);

        $organizationId = $organization->id;
        [
            $ownerRole
        ] = Octane::concurrently([
            fn() => OrganizationRole::create([
                'organization_id' => $organizationId,
                'name' => 'owner',
                'status' => 'active',
                'user_id' => $userId,
                'permissions' => config('roles.owner'),
            ]),
            fn() => OrganizationRole::create([
                'organization_id' => $organizationId,
                'name' => 'admin',
                'status' => 'active',
                'user_id' => $userId,
                'permissions' => config('roles.admin'),
            ]),
            fn() => OrganizationRole::create([
                'organization_id' => $organizationId,
                'name' => 'member',
                'status' => 'active',
                'user_id' => $userId,
                'permissions' => config('roles.member'),
            ]),
            fn() => OrganizationRole::create([
                'organization_id' => $organizationId,
                'name' => 'agent',
                'status' => 'active',
                'user_id' => $userId,
                'permissions' => config('roles.agent'),
            ]),
        ]);

        $roleId = $ownerRole->id;
        Octane::concurrently([
            fn() => User::where('id', $userId)->update(['selected_organization_id' => $organizationId]),
            fn() => OrganizationMembership::create([
                'user_id' => $userId,
                'organization_id' => $organizationId,
                'organization_role_id' => $roleId,
                'roleTitle' => 'Owner',
                'status' => 'active',
            ]),
        ]);

        SetupOrganizationWallets::dispatch($organizationId);
    }
}
