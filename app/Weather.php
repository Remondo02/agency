<?php

namespace App;

use Illuminate\Cache\Repository;

class Weather
{

    // public function __construct(public string $apiKey)
    // {
    // }

    public function __construct(private Repository $cache)
    {

    }

    public function isSunnyTomorrow()
    {
        $result = $this->cache->get('weather');
        if ($result !== null) {
            return $result;
        }
        // ...
        return true;
    }
}
