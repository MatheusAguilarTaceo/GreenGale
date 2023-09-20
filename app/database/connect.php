<?php
   
function connect(){  
    $dbHostname = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro_usuarios';
    
    $conexao =  new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);  
    
    if($conexao->connect_errno){
        return $conexao->error;
    }else{
        // echo("Conexão efetuada com sucesso");
        // die();
        return $conexao;
    }

    
}