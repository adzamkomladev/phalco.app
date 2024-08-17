<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return hybridly('welcome');
});

Route::get('/home', function () {
    return hybridly('welcome');
});
Route::get('/elections', fn() => hybridly('elections.index'));


#region Auth Routes

Route::prefix('google')
    ->name('google.')
    ->group(function () {
        Route::get('redirect', \App\Actions\Auth\Google\Redirect::class)->name('redirect');
        Route::get('callback', \App\Actions\Auth\Google\Callback::class)->name('callback');
    });

Route::prefix('email')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('verification-notification', \App\Actions\Auth\Verification\SendEmail::class)
            ->middleware(['throttle:6,1'])
            ->name('verification.send');
        Route::get('verify/{id}/{hash}', \App\Actions\Auth\Verification\VerifyEmail::class)
            ->middleware(['signed'])
            ->name('verification.verify');
    });

Route::prefix('password')
    ->name('password.')
    ->middleware(['guest'])
    ->group(function () {
        Route::post('send/reset-link', \App\Actions\Auth\Password\SendResetLink::class)->name('send.reset-link');
        Route::get('reset/{token}', fn(string $token) => hybridly('auth.reset-password', ['token' => $token]))->name('reset-link');
        Route::post('reset', \App\Actions\Auth\Password\Reset::class)->name('reset');
    });

#endregion
