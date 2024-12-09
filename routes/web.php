<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});


