<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Laravel\Octane\Facades\Octane;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('view-octane-tests', function () {
    logger('Start view octane tests');

    [$appName, $user] = Octane::concurrently([
        fn () => Cache::store('octane')->get('application'),
        fn () => Octane::table('users')->get('123'),
    ]);

    logger('Data retrieved from octane cache and table: appName: {appName}, user: {user} ', ['appName' => $appName, 'user' => $user]);

    logger('End view octane tests');
})->purpose('View Octane Tests')->everyMinute();

Artisan::command('telescope:prune --hours=720', fn () => $this->info('Telescope data from 30 days ago deleted'))
    ->daily();
Artisan::command('horizon:snapshot', fn () => $this->info('Horizon snapshot'))->everyFiveMinutes();

// Sort of quick fix for Pulse memory issues
// TODO: Fix pulse:check memory issues properly
Artisan::command('pulse:restart', fn () => $this->info('Pulse Restarted'))
    ->purpose('Restart pulse to clear memory hogging situation')
    ->hourly();
