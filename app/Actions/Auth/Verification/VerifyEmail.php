<?php

namespace App\Actions\Auth\Verification;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
