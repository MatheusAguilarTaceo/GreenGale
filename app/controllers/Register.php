<?php

namespace app\controllers;

class Register{
    public function index(){
        return [
            'views' => 'register.php',
            'data' => [
                'title-menu' => 'Registrar-se | Greengale', 
                'css' => 'register.css',
                'js' => 'register.js']
        ]; 
    }    

    public function create(){
        $validate = validate([
            'name' => 'required',
            'email' => 'required|email|unique:registered_users',
            'password' => 'required|maxlen:10'
        ]);
        
        if(in_array(false, $validate)){
            $status = false;
            $msg = getFlash('name').' '. getFlash('email').' '.getFlash('password');
            $time = 4000;
            echo json_encode(['status'=> $status,'msg'=> $msg, 'time' => $time]);
            return ;
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
            $status = false;
            $msg = 'Erro ao cadastrar usuário!';
            $time = 4000;
            echo json_encode(['status' => $status, 'msg' => $msg, 'time' => $time]); 
            return; 
        }
        send_mail($validate['email'], $validate['name'], $validate['token']);
        $status = true;
        $msg = 'Cadastro realizado! Confirme sua caixa de email para validar a conta';
        $time = 10000;
        $redirect = '.';
        echo json_encode(['status' => $status, 'msg' => $msg, 'time' => $time, 'redirect' => $redirect],);
    }
    
    public function emailConfirmation(){
        $db_name = $_ENV['DB_NAME_USERS'];
        $db_username = $_ENV['DB_USERNAME_USERS'];
        $db_password = $_ENV['DB_PASSWORD_USERS'];
        $table = TABLE_USERS;
        $token = $_GET['key'];
        $where_field = ['token' => [$token]];
        $operator = ['='];
        $select_fields = 'id, name, email';
        $result = findBy($db_name, $db_username, $db_password, $table, $where_field, $operator, $select_fields);
        if(isset($result->id)){
            $set_fields_values = ['token' => NULL, 'email_confirmation_id' => '2'];
            $where_fields_values = ['id' => $result->id];
            update($db_name, $db_username, $db_password, $table, $set_fields_values, $where_fields_values);
            $_SESSION[LOGGED] = $result;
            return redirect('account'); 
        }
        return redirect('resend-email-confirmation'); 
    }

    public function resendEmail(){
        return [
            'views' => 'resend_email.php',
            'data' =>[
                        'title-menu' => 'Reenviar email | Greengale',
                        'css' =>'resend_email.css',
                        'js' => 'resend_email.js']
        ];
    }
}