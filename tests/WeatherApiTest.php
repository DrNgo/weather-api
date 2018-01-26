<?php


use PHPUnit\Framework\TestCase;

/**
 * Class WeatherApiTest
 * @covers WeatherApi
 */
class WeatherApiTest extends TestCase
{
    public function testGetByZip()
    {
        $expected = [
            'city' => 'Atlanta',
            'description' => 'Clear',
            'temperature' => '51.94'
        ];

        $apiResponse = '{"coord":{"lon":-84.4,"lat":33.93},"weather":[{"id":800,"main":"Clear","description":"clear sky","icon":"01n"}],"base":"stations","main":{"temp":51.94,"pressure":1032,"humidity":40,"temp_min":48.2,"temp_max":55.4},"visibility":16093,"wind":{"speed":0.56,"deg":260.501},"clouds":{"all":1},"dt":1516923300,"sys":{"type":1,"id":760,"message":0.0047,"country":"US","sunrise":1516970296,"sunset":1517007746},"id":0,"name":"Atlanta","cod":200}';
        $client = $this->prophesize('\GuzzleHttp\Client');
        $psr7Response = $this->prophesize('Psr\Http\Message\ResponseInterface');
        $psr7Response->getBody()->willReturn($apiResponse);
        $client->get(
            \Prophecy\Argument::type('string')
        )->willReturn($psr7Response->reveal());

        $api = new WeatherApi($client->reveal(), '12345');

        $this->assertEquals($expected, $api->getCurrentByZip('30328'));
    }

    public function testGetByZipNotFound()
    {
        $client = $this->prophesize('\GuzzleHttp\Client');
        $client->get(
            \Prophecy\Argument::type('string')
        )->willThrow($this->prophesize('\GuzzleHttp\Exception\ClientException')->reveal());

        $api = new WeatherApi($client->reveal(), '12345');

        $this->expectException('\Exceptions\ZipNotFound');
        $this->expectExceptionMessage('79341 not found');

        $api->getCurrentByZip('79341');
    }
}
