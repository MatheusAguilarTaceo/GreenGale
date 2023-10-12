<?php

namespace app\controllers;

class User{
    public function show($params){
        if(!isset($params['user'])){   
            return  [];
        }
        
        $dbName = '';
        $dbUsername = '';
        $dbPassword = '';
        $table = '';
        
        $users = findBy($dbName, $dbUsername, $dbPassword, $table,  "id" , $params["user"]);
        
        return[
            'views' => 'user.php',
            'data' => ['title' => 'User', 'users' => $users]
       ];   
        
    }
}
    