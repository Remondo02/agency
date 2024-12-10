<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [PropertyController::class, 'show'])->name('property.show')->where(['property' => $idRegex, 'slug' => $slugRegex]);

Route::post('/biens/{property}/contact', [PropertyController::class, 'contact'])->name('property.contact')->where(['property' => $idRegex]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', AdminPropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
