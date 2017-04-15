<?php
    require __DIR__ . '/vendor/autoload.php';

    use j4mie\idiorm\idiorm;

    require_once ("app/Resources/configuration/db_configuration.php");

    $route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($route)) {
        $url = $route;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        require 'src/Controller/' . $url[0] . '.php';
    }

    $controller = new $url[0];

    if(isset($url[2])) {
        $controller->$url[1]($url[2]);
    } else {
        if(isset($url[1])) {
            $controller->$url[1]();
        }
    }