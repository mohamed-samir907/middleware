<?php

/**
 * Create New Instance From The Middleware Class
 */
$middleware = Middleware::getInstance();
$middleware->setDirectory(MIDDLEWARE_DIRECTORY);


/**===================================================
 * Register the Middlewares
 * 
 * Usage:
 * 
 * $middleware->make(used_name, class_name);
 * used_name => The name you will use in you project
 * class_name => The name of Middleware Class
 * ===================================================
 */

$middleware->make('auth', 'Auth');
$middleware->make('session', 'Session');