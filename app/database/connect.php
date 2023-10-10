<?php
   
function connect($dataBase){  
    $dbHostname = 'Localhost';
    $dbUsername = 'db_app_gg';
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