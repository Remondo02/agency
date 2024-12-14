<?php

namespace App;

class Weather
{

    public function __construct(public string $apiKey)
    {
    }

    public function isSunnyTomorrow()
    {
        return true;
    }
}
