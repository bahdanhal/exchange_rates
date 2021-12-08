<?php
namespace App;
use \Controllers\Controller;

class Router {
    private const ROUTES = [
        'index' => 'IndexController',
        'rate' => 'RateController',
    ];

    private static function getControllerClass($route)
    {
        if(!array_key_exists($route, static::ROUTES)){
            return false;
        }
        $className = static::ROUTES[$route];
        return '\Controllers\\' . $className;
    }
    public static function run()
    {
        try {
            $route = trim($_REQUEST['route']??'index');
            
            $route = rtrim($route, '/');

            if (!preg_match('~^[-a-z0-9/_]+$~i', $route)) 
                throw new \Exception('Not allowed route');
            $controllerClass = static::getControllerClass($route);
            if(!$controllerClass || !class_exists($controllerClass))
                throw new \Exception('Route not found');
            
            $controller = new $controllerClass;
            if($controller instanceof Controller){
                $controller->execute();
            } else {
                throw new \Exception('Route class is not controller');
            }
            
        } catch (\Throwable $ex) {

            include $_SERVER["DOCUMENT_ROOT"].'/view/404.php';
        }
    }
}