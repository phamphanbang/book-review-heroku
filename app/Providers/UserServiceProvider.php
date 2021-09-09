<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\UserService;
use App\Library\Services\Contracts\UserServiceInterface;

class UserServiceProvider extends ServiceProvider
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
        $this->app->bind(UserServiceInterface::class,UserService::class);
    }
}
