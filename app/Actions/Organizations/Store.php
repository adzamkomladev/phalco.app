<?php

namespace App\Actions\Organizations;

use App\Models\OrganizationMembership;
use App\Models\OrganizationRole;
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
            dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(User $user, array $data)
    {
        $userId = $user->id;

        $organization = $user->organizationsOwned()->create($data);
        $role = OrganizationRole::create([
            'organization_id' => $organization->id,
            'name' => 'owner',
            'status' => 'active',
            'user_id' => $userId,
            'permissions' => [
                'elections' => [
                    'create' => true,
                    'read' => true,
                    'update' => true,
                    'delete' => true
                ],
                'settings' => [
                    'team' => [
                        'create' => true,
                        'read' => true,
                        'update' => true,
                        'delete' => true
                    ],
                    'organization' => [
                        'create' => true,
                        'read' => true,
                        'update' => true,
                        'delete' => true
                    ]
                ]
            ]
        ]);

        $organizationId = $organization->id;
        $roleId = $role->id;

        Octane::concurrently([
            fn() => User::where('id', $userId)->update(['selected_organization_id' => $organizationId]),
            fn() => OrganizationMembership::create([
                'user_id' => $userId,
                'organization_id' => $organizationId,
                'organization_role_id' => $roleId,
                'roleTitle' => 'Owner',
                'status' => 'active',
            ])
        ]);
    }
}
