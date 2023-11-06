<?php 
    function showNavForMenu($views){ 
        if(isset($_SESSION[LOGGED])){
            // return  'header_structure/logged.php';
            return require  VIEWS.'header_structure/logged.php';
        }else{
            return  require VIEWS.'header_structure/not_logged.php';
        }
    }

    function redirectLogin(){
        return str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
    }
?>