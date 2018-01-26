<?php


class WeatherApi
{
    private $client;
    private $key;
    private $url = 'http://api.openweathermap.org/data/2.5/weather?units=imperial&';

    public function __construct(\GuzzleHttp\Client $client, $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    public function getCurrentByZip($zip)
    {
        try{
            $response = $this->client->get($this->url."zip=$zip,us&appid={$this->key}");
        }catch(\GuzzleHttp\Exception\ClientException $e){
            throw new \Exceptions\ZipNotFound("{$zip} not found");
        }
        $decodedResponse = json_decode($response->getBody(),true);
        $formattedResponse = [
            'city' => $decodedResponse['name'],
            'description' => $decodedResponse['weather'][0]['main'],
            'temperature' => $decodedResponse['main']['temp']
        ];
        return $formattedResponse;
    }
}