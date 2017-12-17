<?php

namespace Jadjoubran\LaravelAngular\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;
use Jadjoubran\LaravelAngular\Command\InstallCommand;

class LaravelAngularServiceProvider extends ServiceProvider
{
    protected function registerResponseMacros()
    {
        $response = app(ResponseFactory::class);

        $response->macro('success', function ($data) use ($response) {
            return $response->json([
                'errors' => false,
                'data' => $data
            ]);
        });

        $response->macro('error', function ($message, $status = 422, $additional_info = []) use ($response) {
            return $response->json([
            'message' => $status . ' error',
            'errors' => [
                'message' => $message,
                'info' => $additional_info,
            ],
            'status_code' => $status
            ], $status);
        });
    }

    //Compatibility with Laravel < 5.3
    public function register()
    {

    }

    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
        ]);
        }
    }
}
