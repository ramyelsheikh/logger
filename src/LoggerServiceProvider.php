<?php

namespace Influencers\Logger;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Influencers\Logger\LoggerController');
        $this->app->make('Influencers\Logger\MongodbLogger');
        $this->loadViewsFrom(__DIR__.'/views', 'logger');
    }
}
