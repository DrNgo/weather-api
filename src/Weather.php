<?php


class Weather
{
    private $api;

    public function __construct(WeatherApi $api)
    {
        $this->api = $api;        
    }
    
    public function getCurrentByZip($zip)
    {
        $currentWeather = $this->api->getCurrentByZip($zip);

        return "The weather in {$currentWeather['city']} is currently {$currentWeather['temperature']} degrees and {$currentWeather['description']}";
    }
}