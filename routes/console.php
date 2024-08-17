<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('view-octane-tests', function () {
    logger('Start view octane tests');

    [$appName, $user] = Octane::concurrently([
        fn() => Cache::store('octane')->get('application'),
        fn() => Octane::table('users')->get('123')
    ]);

    logger('Data retrieved from octane cache and table: ', ['appName' => $appName, 'user' => $user]);

    logger('End view octane tests');
})->purpose('View Octane Tests')->everyMinute();


Artisan::command('telescope:prune --hours=720', fn() => $this->info('Telescope data from 30 days ago deleted'))
    ->daily();
