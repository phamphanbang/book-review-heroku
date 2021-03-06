<?php

namespace App\Providers;

use App\Models\Book;
use App\Observers\BookObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
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

        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Book::observe(BookObserver::class);

        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
