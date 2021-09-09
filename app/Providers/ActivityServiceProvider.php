<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\ActivityService;
use App\Library\Services\Contracts\ActivityServiceInterface;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ActivityServiceInterface::class,ActivityService::class);
    }
}
