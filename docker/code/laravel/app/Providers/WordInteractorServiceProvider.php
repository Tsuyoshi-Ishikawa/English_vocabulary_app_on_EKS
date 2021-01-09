<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\UseCases\Interactors\WordInteractor;

class WordInteractorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WordInteractor', function($app){
            return new WordInteractor();
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
