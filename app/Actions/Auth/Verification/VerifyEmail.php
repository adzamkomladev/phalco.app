<?php

namespace App\Actions\Auth\Verification;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class VerifyEmail
{
    use AsAction;

    public function asController(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('email.verified');
    }

    public function handle()
    {
        // ...
    }
}
