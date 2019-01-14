<?php

function error_handler($number, $string, $file, $line, $context)
{
    echo $string;
}

function exception_handler($exception)
{
	echo "<pre>";
    print_r($exception);
	echo "</pre>";
}

function dd($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

set_error_handler("error_handler", E_ALL);
set_exception_handler("exception_handler");