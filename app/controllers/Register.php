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
        insert('gg_users', 'registered_users', $validate);
        redirect('.');
    }       

}