<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Companyprofile;
use App\Models\Gallery;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        view()->share('content', Companyprofile::first());
        view()->share('about', About::first());
        view()->share('gallery', Gallery::inRandomOrder()->take(6)->get());
    }
}
