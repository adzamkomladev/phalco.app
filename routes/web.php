<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return hybridly('welcome');
});

Route::get('/home', function () {
    return hybridly('welcome');
});
Route::get('/elections', fn() => hybridly('elections.index'));

Route::post('porn/login', \App\Actions\Auth\Login::class)->name('porn.login');

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
