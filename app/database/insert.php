<?php 

function insert($dbName, $dbUsername, $dbPassword, $table, $elements){
    $fields = implode(',', array_keys($elements));
    $values = str_repeat('?,' , count($elements));
    $values = substr($values,0, -1);
    
    $connect = connect($dbName, $dbUsername, $dbPassword,);
    if(is_array($connect)){
        return $connect;
    }

    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    $prepare = $connect->prepare($sql);
    
    
    if($prepare){
        $types = [str_repeat('s', count($elements))];
        $values = array_values($elements);
        $params = array_merge($types, $values);
        $prepare->bind_param(...$params);
        $result = $prepare->execute();
        if(!$result){
            return ['errno' => $prepare->error_list['errno'], 'error' => $prepare->error_list['error']];
        }
        return $result;
    }
}
function makeValuesReferenced(array & $array) {
    $referencedArray = [];
    foreach ($array as $key => $value) {
        $referencedArray[$key] = &$array[$key];
    }
    return array_merge([str_repeat('s', count($array))], $referencedArray);
}
