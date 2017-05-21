<?php

    require __DIR__ . '/vendor/autoload.php';

    use j4mie\idiorm\idiorm;

    require_once ("app/Resources/configuration/db_configuration.php");

    $route = filter_input(
        INPUT_GET,
        'route',
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    if ($route == 'exit') {
        $url[0] = 'PageController';
        $url[1] = 'exitAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'authorization') {
        $url[0] = 'PageController';
        $url[1] = 'authAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'registration') {
        $url[0] = 'PageController';
        $url[1] = 'regAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'results') {
        $url[0] = 'TestsController';
        $url[1] = 'checkAction';
        require 'src/Controller/TestsController.php';
    } else if ($route == 'topics') {
        $url[0] = 'PageController';
        $url[1] = 'topicsAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'home' || $route == ''){
        $url[0] = 'PageController';
        $url[1] = 'homeAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'test'){
        $url[0] = 'TestsController';
        $url[1] = 'readAction';
        require 'src/Controller/TestsController.php';
    } else if ($route == 'tests'){
        $url[0] = 'PageController';
        $url[1] = 'testsAction';
        require 'src/Controller/PageController.php';
    } else if ($route == 'practice') {
        $url[0] = 'PageController';
        $url[1] = 'practiceAction';
        require 'src/Controller/PageController.php';
    } else if (isset($route)) {
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