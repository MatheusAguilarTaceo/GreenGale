<?php
function routes(){
    return require 'routes.php';
}

#Rota estática
function exactMathUriInArrays($uri, $routes){
    if(array_key_exists($uri, $routes)){
        return  [$uri => $routes[$uri]];
    }else{
        return [];
    }
}

function uriDinamicInArrays($uri, $routes){

    return  array_filter(
        $routes, 
        function($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            $regex = str_replace('?', '\?', ltrim($regex, '/'));
            $result =  preg_match("/^$regex$/", ltrim($uri,'/'));
            return $result;

        },
        ARRAY_FILTER_USE_KEY,       
    );
}
//// FUNÇÃOES QUE POR ENQUNATO N VEJO UTILIDADE 06/11/2023
// function params($uri, $mathchedUri){
//     echo 'params<br>';
//     var_dump($mathchedUri);
//     if(!empty($mathchedUri)){
//         $matchedToGetParams = array_keys($mathchedUri)[0];
//         //array_diff mantem os indices do array retornado
//         return array_diff(
//             $uri,
//             explode('/', ltrim($matchedToGetParams, '/'))
//         );
//     }
// }

// function paramsFormat($uri, $params){
//     echo"AQUI<br>";
//     var_dump($uri);
//     var_dump($params);
//     $paramsData = [];
//     // O params tem indices que o array_diff retornou,  exemplo de retorno [2 => 'A', 4 => 'B', 8 =>'C']
//     // ele é especifico para uma logica em que seus valores e seus nomes estejam em nessa sequência na URI
//     //exemplo  nome/matheus/idade/22/ , pórem eu mudar isto nas versões futuras
//     foreach($params as $index => $param){
//         $paramsData[$uri[$index -1]] = $param;
//     };
   
//     return $paramsData;
// }    


function router(){
    $routes = routes();
   
    $uri = $_SERVER['REQUEST_URI'];
    $requesMethod = $_SERVER['REQUEST_METHOD'];

    $mathchedUri = exactMathUriInArrays($uri, $routes[$requesMethod]);
    $params = [];
    if(empty($mathchedUri)){
        $mathchedUri = uriDinamicInArrays($uri, $routes[$requesMethod]);
        // $uri = explode('/', ltrim($uri, '/'));
        // $params = params($uri, $mathchedUri);
        // $params = paramsFormat($uri, $params);
    }
    

    if(!empty($mathchedUri)){
        return controller($mathchedUri);

    }
    throw new Exception("Algo deu errado!");

}