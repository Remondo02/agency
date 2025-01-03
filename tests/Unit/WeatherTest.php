<?php

use App\Weather;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use Mockery;

afterEach(function () {
    // Clean up Mockery and cache state after each test
    Cache::clearResolvedInstances();
    Mockery::close();
});

test('returns true when cache is null', function () {
    /** @var Repository|Mockery\MockInterface $mock */
    $mock = Mockery::mock(Repository::class);
    $mock->shouldReceive('get')
        ->with('weather')
        ->once()
        ->andReturn(null);

    $weather = new Weather($mock);

    $this->assertTrue($weather->isSunnyTomorrow());
});

test('returns false when cache is false', function () {
    /** @var Repository|Mockery\MockInterface $mock */
    $mock = Mockery::mock(Repository::class);
    $mock->shouldReceive('get')
        ->with('weather')
        ->once()
        ->andReturn(false);

    $weather = new Weather($mock);

    $this->assertFalse($weather->isSunnyTomorrow());
});
