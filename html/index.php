<?php

require __DIR__.'/../bootstrap.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();
require __DIR__.'/../dependencies.php';
require __DIR__.'/../routes.php';

$app->run();

