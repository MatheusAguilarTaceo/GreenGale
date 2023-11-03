<?php

namespace app\controllers;

class Account{
    public function index(){
        return[
            'views' => 'account.php',
            'data' => [
                'title-menu' => 'Usuário',
                'title-page' => 'Account', 
                'css' => 'account.css',
                'js' => 'account.js'
            ]
        ];
    }
}
