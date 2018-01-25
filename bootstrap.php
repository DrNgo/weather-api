<?php
require(__DIR__ . "/src/autoload.php");
require(__DIR__ . "/vendor/autoload.php");
date_default_timezone_set('America/New_York');

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
