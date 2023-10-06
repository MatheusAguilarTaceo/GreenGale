<?php
function routes(){
    return require 'routes.php';
}

function exactMathUriInArrays($uri, $routes){
    if(array_key_exists($uri, $routes)){
        return  [$uri => $routes[$uri]];
    }else{
        return [];
    }
}

function uriDinamicInArrays($uri, $routes){
   return $mathchedUri = array_filter(
        $routes, 
        function($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri,'/'));
        },
        ARRAY_FILTER_USE_KEY,       
    ); 
}

function params($uri, $mathchedUri){
    if(!empty($mathchedUri)){
        $matchedToGetParams = array_keys($mathchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
}

function paramsFormat($uri, $params){
    $paramsData = [];
    foreach($params as $index => $param){
        $paramsData[$uri[$index -1]] = $param;
    };
    return $paramsData;
}    

function router(){
    $routes = routes();
    $uri = $_SERVER['REQUEST_URI'];
    $requesMethod = $_SERVER['REQUEST_METHOD'];

    $mathchedUri = exactMathUriInArrays($uri, $routes[$requesMethod]);
    $params = [];
    if(empty($mathchedUri)){
        $mathchedUri = uriDinamicInArrays($uri, $routes[$requesMethod]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $mathchedUri);
        $params = paramsFormat($uri, $params);
    }


    if(!empty($mathchedUri)){
        return controller($mathchedUri, $params);

    }
    throw new Exception("Algo deu errado!");

}