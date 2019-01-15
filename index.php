<?php

const MIDDLEWARE_DIRECTORY = __DIR__ . '/middleware/';

require_once "helper.php";
require_once "core/Middleware.php";
require_once "kernel.php";


// Example for using the middleware
$middleware->use('session');
$middleware->use('auth');