<?php

namespace Restclient;

use Illuminate\Support\ServiceProvider;

class RestclientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
		$this->loadViewsFrom(__DIR__.'/views', 'views');
		$this->loadViewsFrom(__DIR__.'/views/products', 'products');
		
		$this->publishes([
			__DIR__.'/config/restclient.php' => config_path('restclient.php'),
		]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
