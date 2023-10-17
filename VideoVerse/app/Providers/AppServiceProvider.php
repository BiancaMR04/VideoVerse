<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
        public function register()
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });

        // Repita esse processo para outros repositórios
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }


}
