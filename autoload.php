<?php

// set namespace autoload
spl_autoload_register(function($class){
	$path = __DIR__ . '/' . str_replace('MastodonApi\\', '', $class) . '.php';
	$path = preg_replace('/\\\/', '/', $path);

	if (is_file($path)) require_once $path;
});
