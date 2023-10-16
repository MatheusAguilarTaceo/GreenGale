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
            # erro de chave estrangeira
            $_SESSION["error"] = $result;
            return redirect('register');
        }
        send_mail($validate['email'], $validate['name'], $validate['token']);
        redirect('.');
    }
    
    public function emailConfirmation(){
        $db_name = $_ENV['DB_NAME_USERS'];
        $db_username = $_ENV['DB_USERNAME_USERS'];
        $db_password = $_ENV['DB_PASSWORD_USERS'];
        $table = TABLE_USERS;
        $where_field = 'token';
        $token = $_GET['key'];
        findBy($db_name, $db_username, $db_password, $table, $where_field, $token);
    }

}