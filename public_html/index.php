<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
date_default_timezone_set('America/Cuiba');

require 'bootstrap.php';
try{
    $metadata = router();   
    extract($metadata);
    
    if(!isset($data)){
        throw new Exception("O indice data não existe ");
    }
    if(!isset($data['title-menu'])){
        throw new Exception("O indice title não existe ");
    }
    
    if(!isset($views)){
        throw new Exception("A view não existe ");
        
    }
    if(!file_exists(VIEWS.$views)){
        throw new Exception("Essa views {$views} não existe");
    }
    require VIEWS.'master.php';

}catch(Exception $e){
    var_dump ($e->getMessage());
};

?>