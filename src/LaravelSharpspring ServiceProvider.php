<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\ServiceProvider;
use Config;

class LaravelSharpspringServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('innesm4/laravel-sharpspring');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bindShared('laravel-sharpspring', function($app)
        {
            $client = $app->make('sharpspring');

            $sharpspringApi = new LaravelSharpspring($app['config']->get('laravelSharpspring.accountID'), $app['config']->get('laravelSharpspring.secretKey'));
            return $sharpspringApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */

    public function provides()
    {
        return ['laravel-sharpspring'];
    }

}