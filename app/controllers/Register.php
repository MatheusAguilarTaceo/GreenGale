<?php

namespace app\controllers;

class Register{
    public function index(){
        return [
            'views' => 'register.php',
            'data' => ['title' => 'Registrar-se']
        ]; 
    }    

    public function create(){
        $validate = validate([
            'name' => 'required',
            'email' => 'required|email|unique:cad_user',
            'password' => 'required|maxlen:10'
        ]);
        
        if(in_array(false, $validate)){
            return redirect("register");
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);
        insert($validate, 'cad_user');
    }    

}