<?php

require_once "helper.php";
require_once "core/Middleware.php";

$middleware_directory = __DIR__ . '/middleware/';

$middleware = Middleware::getInstance();
$middleware->setDirectory($middleware_directory);

$middleware->make('auth', 'Auth');
$middleware->make('session', 'Session');

$middleware->use("session");

dd($middleware);