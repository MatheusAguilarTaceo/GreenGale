<?php
function update($db_name, $db_username, $db_password, $table, $set_fields_values, $where_fields_values){
    $connect = connect($db_name, $db_username, $db_password);
    if(is_array($connect)){
        return $connect;
    }
    foreach($set_fields_values as $field => $value){
        $array_set[] = "{$field} = ?";
        $set_values[] = $value;
    }  
    $str_set = implode(',', $array_set); 
  
    foreach($where_fields_values as $field => $value){
        $array_where[] = "{$field} = ?";
        $where_values[] = $value;
    }

    $str_where = implode(' AND ', $array_where);
    $sql = "UPDATE $table SET {$str_set} WHERE {$str_where}";
    
    $prepared_stmt = $connect->prepare($sql);
    if($prepared_stmt){
        $array_set_where = array_merge($set_values,$where_values);
        $params = array_merge( [ str_repeat( 's', count($array_set_where) ) ], $array_set_where);
        $prepared_stmt->bind_param(...$params);
        $result = $prepared_stmt->execute();
        if(!$result){
            return ['errno' => $prepared_stmt->error_list['errno'], 'error' => $prepared_stmt->error_list['error']];
        }
        return $result;
    }
    return ['errno' => $connect->errno, 'error' => $connect->error] ;



}



