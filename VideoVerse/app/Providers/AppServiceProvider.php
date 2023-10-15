<?php

namespace App\Providers;

use App\Models\Video;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        Video::observe(VideoObserver::class);
    }
}
