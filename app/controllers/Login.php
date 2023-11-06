<?php 

namespace app\controllers;

class Login{
    public function index(){
        if(isset($_SESSION[LOGGED])){
            redirect('.');
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

        $dbName = $_ENV['DB_NAME_USERS'];
        $dbUsername = $_ENV['DB_USERNAME_USERS'];
        $dbPassword = $_ENV['DB_PASSWORD_USERS'];
        $table = TABLE_USERS;
        $where_fields = ['email' => [$email]];
        $operator = ['='];
        $user = findBy($dbName,$dbUsername, $dbPassword, $table, $where_fields, $operator);
        if(!$user){
            $status = false;
            $msg =  'Email ou senha incorretos';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }
        if($user->email_confirmation_id == 1){ 
            $status = false;
            $msg  = 'Email não confirmado, confirme seu email e tente novamente';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }
    
        if(!password_verify($password, $user->password)){
            $status = false;
            $msg  = 'Email ou senha incorretos';
            $time = 4000;
            echo  json_encode(['status' =>  $status, 'msg' => $msg, 'time' => $time]);
            return;
        }

        $_SESSION[LOGGED] = $user;
        $status = true;
        $redirect = $_SERVER['REQUEST_URI'];
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

