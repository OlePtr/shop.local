<?php

require_once "./vendor/autoload.php";
$url = $_SERVER["REQUEST_URI"];

$routesConfig = new \Libs\Config\FileSource("./config", "routes");

try {
    $routes = $routesConfig->get();

    $router = new \Libs\Router($routes, "Errors/show404");
    $router->execute($url);
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}
