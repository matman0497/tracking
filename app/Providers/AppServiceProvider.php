<?php

namespace App\Providers;

use App\Repositories\DBTrackingRepository;
use App\Repositories\TrackingRepositoryInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(TrackingRepositoryInterface::class, function (Application $app) {
            return new DBTrackingRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
