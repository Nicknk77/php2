<?php
require __DIR__ . '/../autoload.php';

// получаем REQUEST_URI
$uri = $_SERVER['REQUEST_URI'];

// разбиваем на части REQUEST_URI
$parts = explode('/', $uri);

// Первая буква в названии контроллера должна быть заглавной
foreach ($parts as $key => $part){
    $parts[$key] = ucfirst($part);
}

// Формируем имя контроллера и action
if ($parts[1] === 'Admin'){

    $controllerClass = '\\App\\Controllers\\Admin\\' . (!empty($parts[2]) ? $parts[2] : 'News');

    $actionName = (!empty($parts[3]) ? $parts[3] : 'All');

} else {

    $controllerClass = '\\App\\Controllers\\' . (!empty($parts[1]) ? $parts[1] : 'News');

    $actionName = (!empty($parts[2]) ? $parts[2] : 'Default');
}

$controller = new $controllerClass;

$controller->action($actionName);