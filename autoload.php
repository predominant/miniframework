<?php
/**
 * Store the BASE include path for files
 */
define('BASEPATH', dirname(getcwd()));

/**
 * PHP PSR-0 Compliant SPL Class Autoloader
 *
 * @author Graham Weldon
 */
function __autoload($class) {
	$class = ltrim($class, '\\');
	$fileName  = '';
	$namespace = '';
	if ($lastNsPos = strripos($class, '\\')) {
		$namespace = substr($class, 0, $lastNsPos);
		$class = substr($class, $lastNsPos + 1);
		$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}
	require $fileName . str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
}
