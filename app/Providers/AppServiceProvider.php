<?php

namespace App\Providers;

use App\Coordinates;
use App\Observers\CoordinatesObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Coordinates::observe(CoordinatesObserver::class);
    }
}
