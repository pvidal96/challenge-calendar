<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class Service
{
    public static abstract function getInstance(): Service;

    /**
     * Makes an API call to the @url and returns a json response
     */
    public function httpGetJson(string $url, string $token = '', array|string $query = null): array
    {
        $response = Http::acceptJson()->withToken($token)->get($url, $query);

        return $response->json();
    }
}
