<?php

use App\Events\Users\HelloWorld;
use App\Http\Middleware\EnsureUserHasSelectedOrganization;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    HelloWorld::dispatch(fake()->randomNumber(2));
    return hybridly('welcome');
})->name('welcome');

Route::get('/elections', function () {
    return hybridly('elections.index');
})->middleware('auth')->name('elections');


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

    Route::get('verified', fn() => hybridly('auth.email-verified'))
    ->middleware(['auth'])
        ->name('email.verified');
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

#region Home Routes

Route::get('home', \App\Actions\Home\Index::class)->name('home')
->middleware(['verified', EnsureUserHasSelectedOrganization::class]);

#endregion

#region Organization Routes

Route::prefix('organizations')
    ->name('organizations.')
    ->middleware(['verified'])
    ->group(function () {
        Route::get('select', \App\Actions\Organizations\ShowSelect::class)->name('show.select');
        Route::patch('select', \App\Actions\Organizations\Select::class)->name('select');
        Route::get('create', \App\Actions\Organizations\Create::class)->name('create');
        Route::post('', \App\Actions\Organizations\Store::class)->name('store');
    });

#endregion

#region Uploads Routes

Route::post('assets/upload', \App\Actions\Assets\Upload::class)->name('assets.upload')->middleware('auth');

#endregion

#region Settings Routes

Route::prefix('settings')
    ->name('settings.')
    ->middleware(['verified', EnsureUserHasSelectedOrganization::class])
    ->group(function () {
        Route::get('profile', \App\Actions\Settings\Profile\Index::class)->name('profile');
        Route::get('team', \App\Actions\Settings\Team\Index::class)->name('team');
        Route::get('billing', \App\Actions\Settings\Billing\Index::class)->name('billing');
        Route::get('organization', \App\Actions\Settings\Organization\Index::class)->name('organization');
    });

#endregion
