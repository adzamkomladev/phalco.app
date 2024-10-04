<?php

namespace App\Actions\Auth\Verification;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class SendEmail
{
    use AsAction;

    public function asController()
    {
        $this->handle(request()->user());

        return back()->with('success', 'Verification link sent!');
    }

    public function handle(User $user)
    {
        $user->sendEmailVerificationNotification();
    }
}
