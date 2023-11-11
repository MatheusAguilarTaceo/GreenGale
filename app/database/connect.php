<?php
   
function connect($dbName, $dbUsername, $dbPassword){  
    $dbHostname = 'Localhost';
    try{
        //caso o nome do BD esteja incorreto vai  cair no catch
        $conexao =  new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);  
        return $conexao;
    }
    catch(Exception $e){
        return ['errno' => $e->getCode(), 'error'=> $e->getMessage()];
        
    }
    
   

    
}