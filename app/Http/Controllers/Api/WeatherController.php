<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Weather;

class WeatherController extends Controller
{
    public function index(Weather $weather)
    {
        return ['weather' => $weather->isSunnyTomorrow() ? "sunny" : 'rainy'];
    }
}
