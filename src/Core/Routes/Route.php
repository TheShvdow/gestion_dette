<?php

namespace Src\Core\Routes;

use ReflectionClass;
use Src\Core\Errors\HttpCode;
use Src\Core\Errors\ErrorControlle;



class Route
{
    private static $routes = [];

    public static function post($uri, $controllerAction)
    {
        $uri = self::normalizeUri($uri);
        $controllerName = $controllerAction['controller'];
        $action = $controllerAction['action'];
        self::$routes['POST'][$uri] = "{$controllerName} => {$action}";
    }

    public static function get($uri, $controllerAction)
    {
        $uri = self::normalizeUri($uri);
        $controllerName = $controllerAction['controller'];
        $action = $controllerAction['action'];
        self::$routes['GET'][$uri] = "{$controllerName} => {$action}";
    }




    public static function routePage($method, $uri)
    {
        $uri = self::normalizeUri($uri);

        if (!isset(self::$routes[$method])) {
            self::handleError(HttpCode::NotFound, "Method not allowed: {$method}");
            return;
        }


        $newUri = preg_replace('/\/[0-9]+/', '/{id}', $uri);
        preg_match('/[0-9]+/', $uri, $matches);
        if(isset(self::$routes[$method][$newUri])) {
            $controllerMethod = self::$routes[$method][$newUri];
            list($controllerName, $action) = explode(' => ', $controllerMethod);
            $controllerClass = "Src\\App\\Controller\\{$controllerName}";


           /*  var_dump($controllerName,$action); */
           try {
            $reflectionClass = new ReflectionClass($controllerClass);

            
            if ($reflectionClass->isInstantiable() && $reflectionClass->hasMethod($action)) {
                $controllerInstance = $reflectionClass->newInstance();
                $reflectionMethod = $reflectionClass->getMethod($action);
                $reflectionMethod->invokeArgs($controllerInstance, $matches);
               
            } else {
                self::handleError(HttpCode::NotFound, "Method {$action} not found in controller {$controllerClass}");
            }
        } catch (\ReflectionException $e) {
            self::handleError(HttpCode::Forbidden, "ReflectionException: " . $e->getMessage());
        }
        }
        
    }


    private static function handleError($errorCode, $message)
    {
        $errorController = new ErrorControlle();
        $errorController->loadView($errorCode);
        error_log($message);
    }

    private static function normalizeUri($uri)
    {
        $basePath = '/gestion_dette/public';
        $uri = str_replace($basePath, '', $uri);
        $uri = strtok($uri, '?');
        $uri = preg_replace('#/{2,}#', '/', $uri);
        return '/' . trim($uri, '/');
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}
