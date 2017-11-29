<?php

namespace Influencers\Logger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

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
        $this->publishes([__DIR__.'/config/mongodb.php' => config_path('mongodb.php'),
        ]);
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
