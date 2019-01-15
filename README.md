## What is the Middleware ?
if you work without framework and you want to use the same idea of middleware used in laravel. This is a simple way that allows to you to make a middleware without using a framework.

## How to use it ?
- require the Middleware.php class in your project
- create a folder to put in it our middlewares
- (not required) create a file to put in it the registered middlewares
- to register a middleware use this
--  ```php
	$middleware->make("used name", "class name");
	```
- to use a middleware use this
--  ```php
	$middleware->use("used name");
	```

## Example
```php
<?php
// index.php

const MIDDLEWARE_DIRECTORY = __DIR__ . '/middleware/';

require_once "helper.php";
require_once "core/Middleware.php";
require_once "kernel.php";


// Example for using the middleware
$middleware->use('session');
$middleware->use('auth');
```

<hr>

```php
<?php
// kernel.php

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
```
