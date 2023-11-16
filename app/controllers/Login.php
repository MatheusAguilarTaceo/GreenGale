<?php 

namespace app\controllers;

class Login{
    public function index(){
        if(isset($_SESSION[LOGGED])){
            redirect('.');
            return;
        }
        return[
            'views' => 'login.php',
            'data' => [ 'title-menu' => 'Sua Conta', 
                        'css' => 'login.css',
                        'js' => 'login.js']
        ];
    }
    
    public function store(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $email = filter_var($data['email'],FILTER_SANITIZE_EMAIL);
        $password = filter_var($data['password'],FILTER_SANITIZE_STRING);
        
        if(empty($email) || empty($password)){
            return setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');
        }

        $db_name = $_ENV['DB_NAME_USERS'];
        $db_username = $_ENV['DB_USERNAME_USERS'];
        $db_password = $_ENV['DB_PASSWORD_USERS'];
        $table = TABLE_USERS;
        $where_fields = ['email' => [$email]];
        $operator = ['='];
        $result = findBy($db_name,$db_username, $db_password, $table, $where_fields, $operator);
        if(!$result['status']){
            $status = false;
            $msg =  'Erro ao fazer login';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }
        if(!$result['result']){
            $status = false;
            $msg =  'Email ou senha incorretos';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }
        if($result['result']->email_confirmation_id == 1){ 
            $status = false;
            $msg  = 'Email não confirmado, confirme seu email e tente novamente';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }
    
        if(!password_verify($password, $result['result']->password)){
            $status = false;
            $msg  = 'Email ou senha incorretos';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }

        $_SESSION[LOGGED] = $result;
        $status = true;
        $redirect = $_GET['redirect'];

        echo json_encode(['status' => $status , 'redirect' => $redirect]);
        return;
    }

    public function logout(){
        if(isset($_SESSION[LOGGED])){
            unset($_SESSION[LOGGED]);
            return redirect('.');
        }
        
    }


}

