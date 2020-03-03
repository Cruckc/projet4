<?php
namespace App;
class Autoloader
{
	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class)
	{
	    $file = __DIR__ . '/' . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
	    if (!file_exists($file)) return false;
	    require $file;
	    
	    return true;
	}
}