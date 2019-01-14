<?php

/**
 * Session Middleware
 */
class Session
{
	/**
	 * The Statements that will be executed
	 */
	public static function run()
	{
		if (! isset($_SESSION)) {
			session_start();
		}
	}
}