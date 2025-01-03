<?php

use App\Weather;
use Mockery\MockInterface;

test('with good weather', function () {
    $this->partialMock(Weather::class, function (MockInterface $mock) {
        $mock->shouldReceive('isSunnyTomorrow')->once()->andReturn(true);
    });
    $response = $this->get('/api/weather');
    $response->assertOk();
    $response->assertJsonPath('weather', 'sunny');
});

test('with bad weather', function () {
    $this->partialMock(Weather::class, function (MockInterface $mock) {
        $mock->shouldReceive('isSunnyTomorrow')->once()->andReturn(false);
    });
    $response = $this->get('/api/weather');
    $response->assertOk();
    $response->assertJsonPath('weather', 'sunny');
});
