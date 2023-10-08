<?php

namespace app\controllers;

class Home{
    public function index($params){ 
       return[
            'views' => 'home.php',
            'data' => ['title' => 'Home', 'css' => 'home.css']
       ];   
    }
}
