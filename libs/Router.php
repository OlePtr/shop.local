<?php
namespace Libs;
class Router
{
    protected $routes;

    public function __construct($routes)
    {
        if (is_array($routes)) {
            $this->routes = $routes;
        } else {
            throw new Exception("Настройки машрутизатора должны быть массивом");
        }
    }

    public function execute($path)
    {
        foreach ($this->routes as $route => $pathToController) {
            $matches = [];

            if (preg_match("#^{$route}$#", $path, $matches)) {

                $parts = explode("/", $pathToController);

                $controllerName = "\\Controllers\\{$parts[0]}";
                $controller = new $controllerName;

                $methodName = $parts[1];

                $arg = null;

                if (isset($matches[1])) {
                    $arg = $matches[1];
                }

                $controller->{$methodName}($arg);
            }
        }
    }

}