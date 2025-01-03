<?php

use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/biens', [PropertyController::class, 'index']);
Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
