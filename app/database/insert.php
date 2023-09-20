<?php 

function insert($elements, $table){
    $fields = implode(',', array_keys($elements));
    $values = '';
        for($i = 0; $i < count($elements); $i++){
            $values .= "?,";
        }
    $values = substr($values,0, -1);

    $connection = connect();
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    var_dump($elements);
    echo $sql.'<br>';
    $sequenceOfTypes =  dataTypeString($elements);
    $prepare = $connection->prepare($sql);

    $values = reindexArray($elements);

    if($prepare){
        call_user_func_array([$prepare, 'bind_param'], makeValuesReferenced($values));
        $prepare->execute();
    die();  
    }
}

function dataTypeString($elements){
    $sequenceOfTypes = '';
    foreach ($elements as $element){
        $sequenceOfTypes .= gettype($element)[0];
    }
    return substr($sequenceOfTypes, 0, -1);
}

function makeValuesReferenced(array & $array) {
    $referencedArray = [];
    foreach ($array as $key => $value) {
        $referencedArray[$key] = &$array[$key];
    }
    return array_merge([str_repeat('s', count($array))], $referencedArray);
}

function reindexArray($array) {
    $newArray = [];
    $index = 0;

    foreach ($array as $value) {
        $newArray[$index] = $value;
        $index++;
    }

    return $newArray;
}