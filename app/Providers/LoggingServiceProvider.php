<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Utility\MyLogger3;

class LoggingServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // this is the non singleton method
//         $this->appbind('App\Services\Utility\ILoggerService', function()
//         {
//            return new MyLogger3(); 
//         });
        
        // singleton method
        $this->app->singleton('App\Services\Utility\ILoggerService', function ($app) {
           return new MyLogger3(); 
        });
        
    }
    
    /**
     * for deffered proviers only return the interface that this provider implements.
     * 
     * @return array
     */
    public function provides()
    {
        echo "Deferred true and I am here in provides()";
        return ['App\Services\Utility\ILoggerService'];
    }
}
