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
function findBy($db_name, $db_username, $db_password, $table, $where_fields_values, $operator, $select_fields = '*', $order_by = null){
    $connect = connect($db_name, $db_username, $db_password,);    
    if(is_array($connect)){
        return $connect;
    }
    try{
        $i = 0;
        forEach($where_fields_values as $field => $array){
            forEach($array as $value){
                $array_where[] = "{$field} {$operator[$i]} ?";
                $where_values[] = $value; 
                $i++;
            }   
        }
        $array_where = implode(' AND ', $array_where);

        $sql = "SELECT {$select_fields} FROM {$table} WHERE {$array_where} {$order_by}";
        $prepared_stmt = $connect->prepare($sql);
        if($prepared_stmt){
            $params = array_merge( [str_repeat('s', count($where_values))] , $where_values);
            $prepared_stmt->bind_param(...$params);
            $prepared_stmt->execute();
            $result = $prepared_stmt->get_result(); 
            if($result->num_rows == 1){
                return ['status' => true, 'result' => $result->fetch_object()];
            }else if($result->num_rows > 1){;
                return ['status' => true , 'result' => json_decode(json_encode($result->fetch_all(MYSQLI_ASSOC)))];
            }
            return  ['status' => true, 'result' => $result->fetch_object()];
        }
        return ['status'=> false, 'result' => ['errno' => $connect->errno, 'error'=>$connect->error]];
    }catch(mysqli_sql_exception $e){ 
        return ['status' => false, 'result' => ['errno' => $e->getCode(), 'error'=>$e->getMessage()]];
    }
}

function findTableData($dbName, $dbUsername, $dbPassword, $table, $selectFields, $whereFields, $limit, $offset){
    $connect = connect($dbName, $dbUsername, $dbPassword);
    if(is_array($connect)){
        return $connect;
    }
    try{
        [$candle, $hour, $date] = array_keys($whereFields);
        $sql = "SELECT {$selectFields} FROM {$table}
        WHERE {$candle} >= ? AND {$hour} >= ? AND  {$date} = ?  ORDER BY id desc LIMIT {$limit} OFFSET {$offset}";
        $prepare = $connect->prepare($sql);
        if($prepare){
            $params = array_merge([str_repeat('s', count($whereFields))], array_values($whereFields));
            $prepare->bind_param(...$params);
            $prepare->execute();
            $result = $prepare->get_result(); 
            if($result->num_rows == 1){
                return ['status' => true, 'result' => $result->fetch_object()];
            }else if($result->num_rows > 1){
                return ['status' => true , 'result' => json_decode(json_encode($result->fetch_all(MYSQLI_ASSOC)))];
            }
            return ['status' => true, 'result' => $result->fetch_object()]; 
        }

        return ['status' => false, 'result' => ['errno' => $connect->errno, 'error'=>$connect->error]];
        
    }catch(Exception $e){
        return ['status' => false, 'result' => ['errno' => $e->getCode(), 'error'=>$e->getMessage()]];
    }    
}


