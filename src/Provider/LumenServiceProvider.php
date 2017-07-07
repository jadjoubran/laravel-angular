<?php

namespace Jadjoubran\LaravelAngular\Provider;

use Jadjoubran\LaravelAngular\Provider\LaravelAngularServiceProvider;

class LumenServiceProvider extends LaravelAngularServiceProvider
{
    public function boot()
    {
        $this->registerResponseMacros();
    }
}
