<?php

namespace app\controllers;

class User{
    public function show($params){
        if(!isset($params['user'])){   
            return  [];
        }

        $users = findBy('cad_user',"id", $params["user"] , "*");
        return[
            'views' => 'user.php',
            'data' => ['title' => 'User', 'users' => $users]
       ];   
        
    }
}
    