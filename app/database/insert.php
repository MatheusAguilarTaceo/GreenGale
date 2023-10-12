<?php 

function insert($dbName, $dbUsername, $dbPassword, $table, $elements){
    $fields = implode(',', array_keys($elements));
    $values = str_repeat('?,' , count($elements));
    $values = substr($values,0, -1);

    $connection = connect($dbName, $dbUsername, $dbPassword,);
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    
    $prepare = $connection->prepare($sql);
    $types = [str_repeat('s', count($elements))];
    $values = array_values($elements);
    $params = array_merge($types, $values);
    if($prepare){
        $prepare->bind_param(...$params);
        $prepare->execute();
    }
}

function makeValuesReferenced(array & $array) {
    $referencedArray = [];
    foreach ($array as $key => $value) {
        $referencedArray[$key] = &$array[$key];
    }
    return array_merge([str_repeat('s', count($array))], $referencedArray);
}
