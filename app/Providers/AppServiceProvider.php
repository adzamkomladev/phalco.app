<?php

namespace App\Providers;

use App\Models\Organization;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Console\CliDumper;
use Illuminate\Foundation\Http\HtmlDumper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Facades\Octane;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        HtmlDumper::dontIncludeSource();
        CliDumper::dontIncludeSource();
        Validator::excludeUnvalidatedArrayKeys();
        Model::shouldBeStrict();
        Model::unguard();
        Relation::enforceMorphMap([
            'user' => User::class,
            'organization' => Organization::class,
        ]);
        Date::use(CarbonImmutable::class);

        //region Octane

        Octane::tick('test-ticker-1', function () {
            logger('Start test-ticker-1');

            Cache::store('octane')->put('application', 'Phalco', 60);

            Octane::table('users')->set('123', [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'age' => fake()->numberBetween(18, 100),
            ]);

            logger('End test-ticker-1');
        })->seconds(101);

        //endregion

        //region Socialite

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('google', \SocialiteProviders\Google\Provider::class);
        });

        //endregion
    }
}
