<?php

namespace app\controllers;

class Register{
    public function index(){
        return [
            'views' => 'register.php',
            'data' => ['title' => 'Registrar-se', 'css' => 'register.css']
        ]; 
    }    

    public function create(){
        $validate = validate([
            'name' => 'required',
            'email' => 'required|email|unique:registered_users',
            'password' => 'required|maxlen:10'
        ]);
        
        if(in_array(false, $validate)){
            return redirect('register');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);
        $validate['token'] = bin2hex(random_bytes(30)); 
        $validate['email_confirmation_id']  = 1;
        $dbName = $_ENV['DB_NAME_USERS'];
        $dbUsername = $_ENV['DB_USERNAME_USERS'];
        $dbPassword = $_ENV['DB_PASSWORD_USERS'];
        $table = TABLE_USERS;
        $result = insert($dbName, $dbUsername, $dbPassword, $table, $validate);
        if($result){
            echo $_SESSION["error"] = $result;
            redirect('register');
        }else{
            redirect('.');
        }
    }       

}