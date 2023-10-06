<?php
   
function connect($dataBase){  
    $dbHostname = 'LocalHost';
    $dbUsername = 'gg_aviator';
    $dbPassword = 'Teu292112@ma';
    $dbName = $dataBase;
    
    $conexao =  new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);  
    
    if($conexao->connect_errno){
        return $conexao->error;
    }else{
        // echo("Conexão efetuada com sucesso");
        // die();
        return $conexao;
    }

    
}