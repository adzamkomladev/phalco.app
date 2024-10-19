<?php

use App\Events\Users\HelloWorld;
use App\Http\Middleware\EnsureUserHasSelectedOrganization;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    HelloWorld::dispatch(fake()->randomNumber(2));

    return view('welcome');
})->name('welcome');

Route::get('/phone-verif', function () {

    return hybridly('auth.phone-verification');
})->name('phone-verif');

Route::get('/elections', function () {
    return hybridly('elections.index');
})->middleware('auth')->name('elections');

//region Auth Routes

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

        Route::get('verified', fn () => hybridly('auth.email-verified'))
            ->middleware(['auth'])
            ->name('email.verified');
    });

Route::prefix('password')
    ->name('password.')
    ->middleware(['guest'])
    ->group(function () {
        Route::post('send/reset-link', \App\Actions\Auth\Password\SendResetLink::class)->name('send.reset-link');
        Route::get('reset/{token}', fn (string $token) => hybridly('auth.reset-password', ['token' => $token]))->name('reset-link');
        Route::post('reset', \App\Actions\Auth\Password\Reset::class)->name('reset');
    });

//endregion

//region Home Routes

Route::get('home', \App\Actions\Home\Index::class)->name('home')
    ->middleware(['verified', EnsureUserHasSelectedOrganization::class]);

//endregion

//region Voting Routes

Route::prefix('voting')
    ->name('voting.')
    ->middleware(['verified'])
    ->group(function () {
        Route::prefix('polling-stations')
            ->name('polling-stations.')
            ->group(function () {

                Route::get('{id}/show', \App\Actions\Voting\PollingStations\Show::class)->name('show');
                Route::get('{id}/show/{voteEntryRequestId}/request', \App\Actions\Voting\PollingStations\ShowVoteEntryRequest::class)->name('show.request');
                Route::get('create', \App\Actions\Voting\PollingStations\Create::class)->name('create');
                Route::post('upload', \App\Actions\Voting\PollingStations\Upload::class)->name('upload');
                Route::get('', \App\Actions\Voting\PollingStations\Index::class)->name('index');
                Route::post('', \App\Actions\Voting\PollingStations\Store::class)->name('store');
            });

        Route::prefix('agents')
            ->name('agents.')
            ->group(function () {

                Route::get('{id}/show', \App\Actions\Voting\Agents\Show::class)->name('show');
                Route::get('create', \App\Actions\Voting\Agents\Create::class)->name('create');
                Route::post('upload', \App\Actions\Voting\Agents\Upload::class)->name('upload');
                Route::get('', \App\Actions\Voting\Agents\Index::class)->name('index');
                Route::post('', \App\Actions\Voting\Agents\Store::class)->name('store');
            });

        Route::prefix('ballots')
            ->name('ballots.')
            ->group(function () {

                Route::get('create', \App\Actions\Voting\Ballots\Create::class)->name('create');
                Route::get('{id}/show', \App\Actions\Voting\Ballots\Show::class)->name('show');
                Route::get('', \App\Actions\Voting\Ballots\Index::class)->name('index');
                Route::post('', \App\Actions\Voting\Ballots\Store::class)->name('store');
            });

        Route::prefix('requests')
            ->name('requests.')
            ->group(function () {
                Route::get('create', \App\Actions\Voting\Requests\Create::class)->name('create');
                Route::get('{id}/show', \App\Actions\Voting\Requests\Show::class)->name('show');
                Route::get('', \App\Actions\Voting\Requests\Index::class)->name('index');
                Route::post('', \App\Actions\Voting\Requests\Store::class)->name('store');
            });
    });

//endregion

//region Organization Routes

Route::prefix('organizations')
    ->name('organizations.')
    ->middleware(['verified'])
    ->group(function () {
        Route::get('select', \App\Actions\Organizations\ShowSelect::class)->name('show.select');
        Route::patch('select', \App\Actions\Organizations\Select::class)->name('select');
        Route::get('create', \App\Actions\Organizations\Create::class)->name('create');
        Route::post('', \App\Actions\Organizations\Store::class)->name('store');
        Route::get('invitations/{token}/verify', \App\Actions\Settings\Team\VerifyInvitation::class)->name('invitations.verify');
    });

//endregion

//region Elections Routes

Route::prefix('elections')
    ->name('elections.')
    ->middleware(['verified', EnsureUserHasSelectedOrganization::class])
    ->group(function () {
        Route::get('', \App\Actions\Elections\Index::class)->name('index');
        Route::post('', \App\Actions\Elections\Store::class)->name('store');
        Route::get('create', \App\Actions\Elections\Create::class)->name('create');
        Route::get('{id}/show', \App\Actions\Elections\Show::class)->name('show');
        Route::patch('switch', \App\Actions\Elections\SwitchElection::class)->name('switch');
    });

//endregion

//region Uploads Routes

Route::post('assets/upload', \App\Actions\Assets\Upload::class)->name('assets.upload')->middleware('auth');

//endregion

//region Settings Routes

Route::prefix('settings')
    ->name('settings.')
    ->middleware(['verified', EnsureUserHasSelectedOrganization::class])
    ->group(function () {
        Route::get('profile', \App\Actions\Settings\Profile\Index::class)->name('profile');

        Route::prefix('team')
            ->name('team.')
            ->group(function () {
                Route::get('', \App\Actions\Settings\Team\Index::class)->name('index');
                Route::get('invitations', \App\Actions\Settings\Team\Invitations::class)
                    ->name('invitations');
                Route::post('invitation/send', \App\Actions\Settings\Team\SendInvitation::class)
                    ->name('invitation.send');
                Route::delete('invitation/{id}/delete', \App\Actions\Settings\Team\DeleteInvitation::class)
                    ->name('invitation.delete');

                Route::get('roles', \App\Actions\Settings\Team\Roles::class)
                    ->name('roles');
            });

        Route::get('billing', \App\Actions\Settings\Billing\Index::class)->name('billing');
        Route::get('organization', \App\Actions\Settings\Organization\Index::class)->name('organization');
    });

//endregion
