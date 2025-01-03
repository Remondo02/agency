<?php

use App\Weather;
use Illuminate\Support\Facades\Cache;

afterEach(function () {
    // This is the equivalent of tearDown()
    Cache::clearResolvedInstances();
});

test('returns true when cache is null', function () {
    Cache::shouldReceive('get')
        ->with('weather')
        ->once()
        ->andReturn(null);

    $weather = new Weather();

    $this->assertTrue($weather->isSunnyTomorrow());
});

test('returns false when cache is false', function () {
    Cache::shouldReceive('get')
        ->with('weather')
        ->once()
        ->andReturn(false);

    $weather = new Weather();

    $this->assertFalse($weather->isSunnyTomorrow());
});
