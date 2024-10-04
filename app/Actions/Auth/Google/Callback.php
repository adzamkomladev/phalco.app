<?php

namespace App\Actions\Auth\Google;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Octane\Facades\Octane;
use Laravel\Socialite\Facades\Socialite;
use Lorisleiva\Actions\Concerns\AsAction;

class Callback
{
    use AsAction;

    public function asController()
    {
        return $this->handle();
    }

    public function handle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            [$googleUser, $emailUser] = Octane::concurrently([
                fn () => User::where('google_id', $googleUser->getId())->first(),
                fn () => User::where('email', $googleUser->getEmail())->first(),
            ]);

            if (! $googleUser && $emailUser) {
                return redirect()->route('login')->with('error', 'Account with this email already exists! Trying logging in');
            }

            $user = $googleUser;

            if (! $user) {
                $user = User::create([
                    'first_name' => $googleUser->user['given_name'],
                    'last_name' => $googleUser->user['family_name'],
                    'email' => $googleUser->getEmail(),
                    'email_verified_at' => now(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'role' => 'customer',
                ]);
            }

            Auth::login($user, true);

            return redirect()->route('elections.index');
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return redirect()->route('login')->with('error', 'Failed to authenticate using Google!');
        }
    }
}
