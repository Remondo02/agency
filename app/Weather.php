<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class Weather
{

    // public function __construct(public string $apiKey)
    // {
    // }

    public function __construct()
    {

    }

    public function isSunnyTomorrow()
    {
        $result = Cache::get('weather');
        if ($result !== null) {
            return $result;
        }
        // ...
        return true;
    }
}
