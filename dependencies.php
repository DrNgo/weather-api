<?php
$container['weatherApi'] = function ($c){
    return new WeatherApi(new GuzzleHttp\Client(), $_ENV['weather_key']);
};

$container['weather'] = function ($c){
    return new Weather($c['weatherApi']);
};

$container['errorHandler'] = function ($c) {
    return function ($request, $response, \Exception $exception) use ($c) {
        if(get_class($exception) == 'Exceptions\ZipNotFound'){
            return $c['response']->withStatus(404)
                ->withHeader('Content-Type', 'text/html')
                ->write($exception->getMessage());
        }
        return $c['response']->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};