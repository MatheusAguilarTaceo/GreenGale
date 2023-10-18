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
// Fiz por enquanto a separação das rotas dinamicas, aquelas direcionada a uma pagina para 
// vizualização ou operação no BD que contenham barras, por exemplo: /house/aviator/statistcs e aquelas que contenham
// chaves e valores com o get exemplo: /?nome=Matheus&idade=22&funcao=NaN
    if(stripos($uri,'?')){
        //Uso do GET para chaves e valores
        return $mathchedUri = array_filter(
        $routes, 
        function($value) use($uri) {
            if(stripos($uri, "?") && stripos($value, "?") ){
                $regex = str_replace('/', '\/', ltrim($value, '/'));
                return preg_match("/^\\$regex$/", ltrim($uri,'/'));
            }
        },
        ARRAY_FILTER_USE_KEY,      
        );
    }
    // Uso do GET para rotas mais complexas
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
        //array_diff mantem os indices do array retornado
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
}

function paramsFormat($uri, $params){
    echo"AQUI<br>";
    var_dump($uri);
    var_dump($params);
    $paramsData = [];
    // O params tem indices que o array_diff retornou,  exemplo de retorno [2 => 'A', 4 => 'B', 8 =>'C']
    // ele é especifico para uma logica em que seus valores e seus nomes estejam em nessa sequência na URI
    //exemplo  nome/matheus/idade/22/ , pórem eu mudar isto nas versões futuras
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
        var_dump($mathchedUri);
        $uri = explode('/', ltrim($uri, '/'));
        if(count($uri) != 1 ){    
            $params = params($uri, $mathchedUri);
            $params = paramsFormat($uri, $params);
        }
    }
    

    if(!empty($mathchedUri)){
        return controller($mathchedUri, $params);

    }
    throw new Exception("Algo deu errado!");

}