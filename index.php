<?php

define("INSTALL_PATH", '/uMVC/index.php'); //relative path to index.php 
define("DEFAULT_CONTROLLER", 'welcome'); //default controller  
define("DEFAULT_METHOD", 'index'); //default method  

function dispatcher($controller = "welcome", $method = "index", $parameters = array()) {

    if (file_exists(getcwd() . '/Controller/' . ucwords($controller) . '.php')) {
        include getcwd() . '/Controller/' . ucwords($controller) . '.php';
        $class = 'Controller_' . ucwords($controller);
        $controller = new $class;
        if (method_exists($controller, $method)) {
            call_user_func_array(array($controller, $method), $parameters);
        } else {
            echo '404 method does not exsist.'; //exception handling
        }
    } else {
        echo '404 class does not exist.'; //exception handling
    }
}

function getController() {
    $controller = getRequestArray(INSTALL_PATH);
    if ($controller[0] == '') {
        $controller[0] = DEFAULT_CONTROLLER;
    }

    return $controller[0];
}

function getMethod() {
    $method = getRequestArray(INSTALL_PATH);
    if ($method[1] == '') {
        $method[1] = DEFAULT_METHOD;
    }
    return $method[1];
}

function getParameters() {
    $parameters = getRequestArray(INSTALL_PATH);
    $parameters = array_slice($parameters, 2);
    return $parameters;
}

function getRequestArray($installation_path) {


    $request_array = explode('/', str_replace($installation_path, '', $_SERVER["REQUEST_URI"]));
    var_dump($request_array);
    return $request_array;
}

dispatcher(getController(), getMethod(), getParameters());
?>