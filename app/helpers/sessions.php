<?php 
    function showNavForMenu(){ 
        if(isset($_SESSION[LOGGED])){
            return   VIEWS.'header_structure/logged.php';
        }else{
            return   VIEWS.'header_structure/not_logged.php';
        }
    }

    function redirectLogin($views){
        if($views == 'login.php'){
            return explode('=', $_SERVER['REQUEST_URI'])[1];
        }
        return str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
    }
?>