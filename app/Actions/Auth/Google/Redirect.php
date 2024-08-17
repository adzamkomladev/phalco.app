<?php

namespace App\Actions\Auth\Google;

use Laravel\Socialite\Facades\Socialite;
use Lorisleiva\Actions\Concerns\AsAction;

class Redirect
{
    use AsAction;

    public function asController()
    {
        return hybridly()->external(Socialite::with('google')->redirect()->getTargetUrl());
    }

    public function handle()
    {
        // ...
    }
}
