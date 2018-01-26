<?php

/**
 * @covers Weather
 */
class WeatherTest extends PHPUnit\Framework\TestCase
{
    public function testGetCurrentByZip()
    {
        $apiResponse = [
            'city' => 'Atlanta',
            'description' => 'Clear',
            'temperature' => '51.94'
        ];
        $api = $this->prophesize('WeatherApi');
        $api->getCurrentByZip(
            Prophecy\Argument::exact('30328')
        )->willReturn($apiResponse);
        $weather = new Weather($api->reveal());

        $this->assertEquals('The weather in Atlanta is currently 51.94 degrees and Clear', $weather->getCurrentByZip('30328'));
    }
}