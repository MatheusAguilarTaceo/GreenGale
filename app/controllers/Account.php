<?php

namespace app\controllers;

class Account{
    public function index(){
        if(!isset($_SESSION[LOGGED])){
            redirect('login?redirect=%2Faccount');
            return;
        }
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

    public function editData(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $field  = filter_var($data['field'], FILTER_SANITIZE_STRING);
        $value  = filter_var($data['value'], FILTER_SANITIZE_STRING);
        if($value){
            if($field == 'password')
                $value = password_hash($value, PASSWORD_DEFAULT);
            $db_name = $_ENV['DB_NAME_USERS']; 
            $db_username = $_ENV['DB_USERNAME_USERS']; 
            $db_password = $_ENV['DB_PASSWORD_USERS']; 
            $table = TABLE_USERS;
            $set_field = [$field => $value];
            $where_field =  ['id' => $_SESSION[LOGGED]->id];
            $result = update($db_name, $db_username, $db_password, $table, $set_field, $where_field);
            if(is_array($result)){
                $status = false;
                $msg = 'Erro, algo inesperado aconteceu';
                $time = 4000;
                echo json_encode(['status' => $status, 'msg' => $msg, 'time' => $time]);
                return;
            }

            if($result){
                $_SESSION[LOGGED]->$field = $value;
                $status = true;
                $msg = 'Atualização feita';
                $time = 4000;
                echo json_encode(['status' => $status, 'msg' => $msg, 'time' => $time]);
                return;
            }
           

        }


    }
}
