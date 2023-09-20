<?php

namespace app\controllers;

class Account{
    public function index(){
        return[
            'views' => 'account.php',
            'data' => ['title' => 'Account']
        ];
    }
}
