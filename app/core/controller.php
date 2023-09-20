<?php

function controller($mathchedUri, $params){
    [$controller, $method] = explode('@', array_values($mathchedUri)[0]);
    $controllerWithNamespace = CONTROLLER_PATH.$controller;
    if(!class_exists($controllerWithNamespace)){
       throw new Exception("Controller {$controller} não existe");
    }

    $controllerInstance = new $controllerWithNamespace;
    if(!method_exists($controllerInstance, $method)){
        throw new Exception("Esse metodo {$method} não existe no controller {$controller}");
    }
    $controller = $controllerInstance->$method($params);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        die();
    }
    
    return $controller; 

}