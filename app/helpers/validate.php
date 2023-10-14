<?php 
function validate(array $validations){
    foreach($validations as $field => $validate){
        if(stripos($validate, "|")){
            $validates = explode("|", $validate);
            foreach($validates as $validate){
                if(isset($result[$field]) and $result[$field] == false){
                    break;
                }
                if(stripos($validate, ":")){
                    [$validate, $param] = explode(":", $validate);
                    $result[$field] = $validate($field, $param);
                }else{
                    $result[$field] = $validate($field);
                }
            } 
        }else{
            $result[$field] = $validate($field);
        }
    } 
    return $result;
}

function required($field){
    if($_POST[$field] == ''){
        setFlash($field,'O campo é obrigatório');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}

function email($field){
    $data = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    if(!$data){
        setFlash($field, 'O email é invalido');
        return $data;
    }
    return $data;

}

function unique($field, $table){
    #14/10/2023, organizar os nomes dos parametros
    $data  = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    $dbName = $_ENV['DB_NAME_USERS'];
    $dbUsername = $_ENV['DB_USERNAME_USERS'];
    $dbPassword = $_ENV['DB_PASSWORD_USERS'];
    $table = TABLE_USERS;
    $result = findBy($dbName, $dbUsername, $dbPassword, $table, $field, $data, $field);  
    if(isset($result->email)){
        setFlash($field, 'Email já cadastrado');
        return false;
    }
    return  $data;
}

function maxlen($field, $maxlen){
    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    if(strlen($data) > $maxlen){
        setFlash($field, "A senha deve ter no máximo {$maxlen} caracteres");
        return false;
    }
    return $data;
} 
