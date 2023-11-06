<?php

namespace app\controllers;

class User{
    public function show(){
        $dbName = '';
        $dbUsername = '';
        $dbPassword = '';
        $table = '';
        
        
        return[
            'views' => 'user.php',
            'data' => ['title' => 'User', 'users' => 'users']
       ];   
        
    }
}
    