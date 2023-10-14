<?php
   
function connect($dbName, $dbUsername, $dbPassword){  
    $dbHostname = 'Localhost';
    echo"$dbName<br>$dbUsername<br>$dbPassword";
    $conexao =  new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);  
    
    if($conexao->connect_errno){
        return $conexao->error;
    }else{
        return $conexao;
    }

    
}