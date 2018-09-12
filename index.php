<?php

require_once "./vendor/autoload.php";

$url = $_SERVER["REQUEST_URI"];
echo "Запрощен адрес: {$url}";