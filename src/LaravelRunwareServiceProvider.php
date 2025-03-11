<?php

namespace Daavelar\LaravelRunware;

use Illuminate\Support\ServiceProvider;
use Daavelar\PhpRunwareSDK\Runware;

class LaravelRunwareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('runware', function ($app) {
            return new Runware(config('runware::api_key'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/runware.php' => config_path('runware.php'),
        ]);
    }
}