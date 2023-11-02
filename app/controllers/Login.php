<?php 

namespace app\controllers;

class Login{
    public function index($params){
        if(isset($_SESSION[LOGGED])){
            redirect('.');
        }
        return[
            'views' => 'login.php',
            'data' => ['title-menu' => 'Sua Conta', 
            'css' => 'login.css' ]
        ];
    }
    
    public function store(){
        // $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        // $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);
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
            //return setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');
            $msg =  'Email ou senha incorretos';
            echo  json_encode(['status' => false, 'msg' => $msg]);
            return;
        }
        if($user->email_confirmation_id == 1){ 
            // return setMessageAndRedirect('messageLogin', 'Email não confirmado, confirme seu email e tente novamente', 'login');
            $msg  = 'Email ou senha incorretos';
            echo  json_encode(['status' => false, 'msg' => $msg]);
            return;
        }
    
        if(!password_verify($password, $user->password)){
            // return  setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');    
            $msg  = 'Email ou senha incorretos';
            echo json_encode(['status' => false, 'msg' => $msg]);
            return;
        }

        $_SESSION[LOGGED] = $user;
        echo json_encode(['status' => true , 'redirect' => '.' ]);
        return;
    }

    public function logout(){
        if(isset($_SESSION[LOGGED])){
            unset($_SESSION[LOGGED]);
            return redirect('.');
        }
        
    }


}

