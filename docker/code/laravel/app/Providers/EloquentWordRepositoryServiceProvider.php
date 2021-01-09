<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\DataAccesses\EloquentWordRepository;

class EloquentWordRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WordRepository', function($app){
            return new EloquentWordRepository();
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
