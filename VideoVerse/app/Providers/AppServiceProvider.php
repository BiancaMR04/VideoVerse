<?php

namespace App\Providers;

use App\Models\Comentario;
use App\Observers\CommentObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Seguidor;
use App\Observers\SeguidorObserver;

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
        Seguidor::observe(SeguidorObserver::class);
    }
}
