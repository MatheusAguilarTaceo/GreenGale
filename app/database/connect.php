<?php
   
function connect($dataBase){  
    $dbHostname = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
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