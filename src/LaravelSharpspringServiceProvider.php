<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\ServiceProvider;

class LaravelSharpspringServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
        $this->app->bind('Innesm4\LaravelSharpspring\LaravelSharpspring', function($app){

            $this->app['config']->package('innesm4/laravel-sharpspring', 'Innesm4\LaravelSharpspring\LaravelSharpspring');

            return new LaravelSharpspring($app['config']->get('laravel-sharpspring::accountID'), $app['config']->get('laravel-sharpspring::secretKey'));
        });

        $this->app->singleton('laravel-sharpspring', 'Innesm4\LaravelSharpspring\LaravelSharpspring');

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