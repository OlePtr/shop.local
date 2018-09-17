<?php

require_once "./vendor/autoload.php";
$url = $_SERVER["REQUEST_URI"];

$routes = [
  "/" => "Index/show",
  "/news/" => "News/index",
  "/news/(\d+)" => "News/show",
];

try {
    $router = new \Libs\Router($routes);
    $router->execute($url);
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}
