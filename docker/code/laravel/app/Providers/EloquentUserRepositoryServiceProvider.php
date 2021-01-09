<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\DataAccesses\EloquentUserRepository;

class EloquentUserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserRepository', function($app){
            return new EloquentUserRepository();
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
