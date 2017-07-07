<?php

namespace Jadjoubran\LaravelAngular\Provider;

use Illuminate\Contracts\Routing\ResponseFactory;

class ServiceProvider extends ServiceProvider
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

        $response->macro('error', function ($message, $status = 400, $additional_info = []) use ($response){
            return $response->json([
            'message' => $status . ' error',
            'errors' => [
                'message' => [$message],
                'info' => $additional_info,
            ],
            'status_code' => $status
            ], $status);
        });
    }
}
