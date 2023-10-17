<?php

function findAll($dbName, $dbUsername, $dbPassword,$table, $fields = '*'){
    try{
        $connect = connect($dbName, $dbUsername, $dbPassword);
        $sql = "SELECT {$fields} FROM $table ";
        $query = $connect->query($sql);
        $query = $query->fetch_all(MYSQLI_ASSOC);
        $query = json_decode(json_encode($query));
        return $query;
    }catch(mysqli_sql_exception $e){
        var_dump($e->getMessage());
    }
}
function findBy($dbName, $dbUsername, $dbPassword, $table, $whereField, $value, $selectFields = "*", $operator = "="){
    $connect = connect($dbName, $dbUsername, $dbPassword,);    
    try{
        $sql = "SELECT {$selectFields} FROM {$table} WHERE {$whereField} {$operator} ?";
        $prepare = $connect->prepare($sql);
        if($prepare){
            $prepare->bind_param("s", $value);
            $prepare->execute();
            $result = $prepare->get_result(); 
            if($result->num_rows == 1){
                return $result->fetch_object();
            }else{
                $result = $result->fetch_all(MYSQLI_ASSOC);
                return json_decode(json_encode($result));
            }
        }
        return [];
    }catch(mysqli_sql_exception $error){ 
        echo "erro $error";
        return $error;
    }
}

function findTableData($dbName, $dbUsername, $dbPassword, $table, $selectFields, $whereFields, $limit, $offset){
    $conect = connect($dbName, $dbUsername, $dbPassword);
    [$candle, $hour, $date] = array_keys($whereFields);
    
    try{
        $sql = "SELECT {$selectFields} FROM {$table}
        WHERE {$candle} >= ? AND {$hour} >= ? AND  {$date} = ?  ORDER BY id desc LIMIT {$limit} OFFSET {$offset}";
        $prepare = $conect->prepare($sql);
        if($prepare){
            $params = array_merge([str_repeat('s', count($whereFields))], array_values($whereFields));
            $prepare->bind_param(...$params);
            $prepare->execute();
            $query = $prepare->get_result(); 
            $query = $query->fetch_all(MYSQLI_ASSOC);
            return $query;
        }
        $query = [];        
        return $query;
        
    }catch(Exception $e){
        echo "Exceção capturada: " . $e->getMessage();  
        return $e;
    }    
}


