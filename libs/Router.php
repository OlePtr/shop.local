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
            if (preg_match("#^{$route}$#", $path)) {
                $parts = explode("/", $pathToController);

                $controllerName = "\\Controllers\\{$parts[0]}";
                $controller = new $controllerName;
                $methodName = $parts[1];

                $controller->{$methodName}();
            }
        }
    }

}