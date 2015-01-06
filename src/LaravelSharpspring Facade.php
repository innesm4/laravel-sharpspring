<?php namespace Innesm4\LaravelSharpspring;

use Illuminate\Support\Facades\Facade;

class LaravelSharpspringFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sharpspring';
    }

}
