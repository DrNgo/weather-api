<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/{zip}', function (Request $request, Response $response, array $args) {
    return $response->withJson($this->weather->getCurrentByZip($args['zip']));
});