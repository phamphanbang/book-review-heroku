<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\UploadImageService;
use App\Library\Services\Contracts\UploadImageServiceInterface;

class UploadImageServiceProvider extends ServiceProvider
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
        //
        $this->app->bind(UploadImageServiceInterface::class,UploadImageService::class);
    }
}
