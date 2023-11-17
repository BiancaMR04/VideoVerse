<?php

namespace App\Providers;

use App\Models\Comentario;
use App\Observers\CommentObserver;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Comentario::observe(CommentObserver::class);
    }
}
