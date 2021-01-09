<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\UseCases\Interactors\UserInteractor;

class UserInteractorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserInteractor', function($app){
            return new UserInteractor();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
