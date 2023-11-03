<?php 

function setFlash($index, $message){
    $_SESSION['flash'][$index] = $message ;
}

function getFlash($index, $style = "color:red"){
    if(isset($_SESSION['flash'][$index])){
        $flash = $_SESSION['flash'][$index];
        unset($_SESSION['flash'][$index]);
        return $flash;  
    }
}


?>