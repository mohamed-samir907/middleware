<?php

/**
 * Middleware Class
 */
class Middleware
{
	/**
	 * The Instance of The Class
	 * 
	 * @var Object
	 */
	private static $object = null;

	/**
	 * The Middlewares Container
	 * 
	 * @var array
	 */
	private $container = [];

	/**
	 * Middlewares Directory
	 * 
	 * @var mixed
	 */
	private $directory;

	/**
	 * Cosntructor
	 */
	private function __construct() {}

	/**
	 * Create Instance from The Class
	 * 
	 * @param mixed Middlewares Directory
	 * @return Object
	 */
	public static function getInstance()
    {
        if (self::$object == null)
            self::$object = new self();

        return self::$object;
    }

    /**
     * Set The Middlewares Directory
     * 
     * @param mixed $directory
     * @return void
     */
    public function setDirectory($directory)
    {
    	$this->directory = rtrim(str_replace('\\', '/', $directory), '/') . '/';
    }

	/**
	 * Store The Middleware in The Middlewares Container
	 * 
	 * @param string $name
	 * @param string $className
	 */
	public function make($name, $className)
	{
		$this->container[$name] = $className;
	}

	/**
	 * Set Middleware to a Class and Run it
	 * 
	 * @return 
	 */
	public function use($middleware)
	{
		require $this->check($middleware);
		$this->getClassName($middleware)::run();
	}

	/**
	 * Check if the middleware is exists or not
	 * 
	 * @param string $middleware
	 * @return mixed | Exception
	 */
	private function check($middleware)
	{
		$file;
		
		# First: Check if the middleware exists in the container
		if (array_key_exists($middleware, $this->container))
			$file = $this->getClassName($middleware) . '.php';
		else 
			throw new Exception("The Middleware not Found");

		# Second: Check if the middleware exists in the middleware directory
		if (file_exists($this->directory . $file)) {
			$file = $this->directory . $file;
			return $file;
		}
		else {
			throw new Exception("The Middleware doesn't exists in the middleware directory");
		}
	}

	/**
	 * Get Class Name from The Container
	 * 
	 * @param string $name
	 * @return string
	 */
	private function getClassName($name)
	{
		return $this->container[$name] ?? "Not Found";
	}
}