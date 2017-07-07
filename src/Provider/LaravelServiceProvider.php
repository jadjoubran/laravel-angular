<?php

namespace Jadjoubran\LaravelAngular\Provider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->registerResponseMacros();
    }
}
