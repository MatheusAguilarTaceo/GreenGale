<?php

namespace app\controllers;

class Home{
    public function index(){ 
       return[
            'views' => 'home.php',
            'data' => ['title-menu' => 'Greengale | Site de estatísticas para jogos do tipo Crash ',
            'title-page' => 'Jogos Crash',
            'css' => 'home.css',
            'js' => 'none.js']
       ];   
    }
}
