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
    $json = file_get_contents('php://input'); 
    $data = json_decode($json, true);
    if($data[$field] == ''){
        setFlash($field,'O campo é obrigatorio!');
        return false;
    }
    return filter_var($data[$field], FILTER_SANITIZE_STRING);
}

function email($field){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);   
    $value_filtered = filter_var($data[$field], FILTER_VALIDATE_EMAIL);
    if(!$value_filtered){
        setFlash($field, 'O email é invalido!');
        return $value_filtered;
    }
    return $value_filtered;

}

function unique($field, $table){
    #14/10/2023, organizar os nomes dos parametros
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $value_filtered  = filter_var($data[$field], FILTER_SANITIZE_STRING);
    $dbName = $_ENV['DB_NAME_USERS'];
    $dbUsername = $_ENV['DB_USERNAME_USERS'];
    $dbPassword = $_ENV['DB_PASSWORD_USERS'];
    $table = TABLE_USERS;
    $where_fields = [$field => [$value_filtered]];
    $operator = ['='];
    $result = findBy($dbName, $dbUsername, $dbPassword, $table, $where_fields, $operator);  
    if(is_array($result)){
        setFlash($field, 'Erro ao validar usuário!');
        return false;
    }
    if(isset($result->email)){
        setFlash($field, 'Email já cadastrado!');
        return false;
    }
    return  $value_filtered;
}

function maxlen($field, $maxlen){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $value_filtered = filter_var($data[$field], FILTER_SANITIZE_STRING);
    if(strlen($value_filtered) > $maxlen){
        setFlash($field, "A senha deve ter no máximo {$maxlen} caracteres");
        return false;
    }
    return $value_filtered;
} 
