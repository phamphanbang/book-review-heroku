<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\CartService;
use App\Library\Services\Contracts\CartServiceInterface;

class CartServiceProvider extends ServiceProvider
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
        $this->app->bind(CartServiceInterface::class,CartService::class);
    }
}
