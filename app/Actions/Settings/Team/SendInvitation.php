<?php

namespace App\Actions\Settings\Team;

use App\Models\OrganizationInvitation;
use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SendInvitation
{
    use AsAction;

    public function rules(): array
    {
        return [
            'email' => ['required', 'max:100'],
            'role_id' => ['required'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $this->handle($request->user(), $request->validated());

        return back()->with('success', 'Invitation sent!');
    }

    public function handle(User $user, array $data)
    {
        $invitation = OrganizationInvitation::pending()
            ->where('email', $data['email'])
            ->where('organization_id', $user->currentOrganization->id)
            ->first();

        if ($invitation !== null) {
            $invitation->update(['status' => 'cancelled']);
        }

        CreateInvitation::dispatch($user->id, $user->currentOrganization->id, $user->currentOrganization->name, $data['email'], $data['role_id']);
    }
}
