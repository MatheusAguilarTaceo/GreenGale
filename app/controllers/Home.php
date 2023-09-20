<?php

namespace app\controllers;

class Home{
    public function index($params){ 
        // $users =findAll('cad_user');
        $users =  '';
       return[
            'views' => 'home.php',
            'data' => ['title' => 'Home', 'users' => $users]
       ];   
    }
}
