<?php 

namespace app\controllers;

class Login{
    public function index($params){
        if(isset($_SESSION[LOGGED])){
            redirect('.');
        }
        return[
            'views' => 'login.php',
            'data' => ['title' => 'Login', 'css' => 'login.css' ]
        ];
    }
    
    public function store(){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);
        
        if(empty($email) || empty($password)){
            return setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');
        }
        $user = findBy('gg_users','registered_users', 'email', $email);
        
        if(!$user){
            return setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');
        }
    
        if(!password_verify($password,$user->password)){
            return  setMessageAndRedirect('messageLogin', 'Email ou senha incorretos', 'login');    
            
        }

        $_SESSION[LOGGED] = $user;
        return redirect(PUBLIC_HTML.'index.php');


    }

    public function logout(){
        if(isset($_SESSION[LOGGED])){
            unset($_SESSION[LOGGED]);
            return redirect(PUBLIC_HTML.'index.php');
        }
    }


}

