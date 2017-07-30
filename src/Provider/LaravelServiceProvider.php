<?php

namespace Jadjoubran\LaravelAngular\Provider;

use Jadjoubran\LaravelAngular\Provider\LaravelAngularServiceProvider;

class LaravelServiceProvider extends LaravelAngularServiceProvider
{
    public function boot()
    {
        $this->registerResponseMacros();

        $this->registerCommands();
    }
}
