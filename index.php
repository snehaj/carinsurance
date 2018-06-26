<?php
/**
 * Insly index.php
 *
 * @author Sneha J
 */
use Insti\Components\View;
use Insti\Components\ErrorHandler;

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$pathParts = explode('/',$path);
$controller = !empty($pathParts[1]) ? ucfirst($pathParts[1]) . 'Controller' : 'HomeController';
$action = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'index';


try {
    $controllerClassName = 'Insti\\Controllers\\' . $controller;
    $controller = new $controllerClassName;
    $method = $action . 'action';
    $controller->$method();
  }
  catch (ErrorHandler $e) 
  {
    $error = new View();
    $error->error = $e->getMessage();
    $error->display('404.php');
    die;
  }
