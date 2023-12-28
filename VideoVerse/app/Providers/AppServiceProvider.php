<?php

namespace App\Providers;

use App\Models\Comentario;
use App\Observers\CommentObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Seguidor;
use App\Observers\SeguidorObserver;
use App\Models\Denuncia;
use App\Observers\DenunciaObserver;
use App\Models\Video;
use App\Observers\VideoObserver;

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
        Denuncia::observe(DenunciaObserver::class);
        Video::observe(VideoObserver::class);
    }
}
