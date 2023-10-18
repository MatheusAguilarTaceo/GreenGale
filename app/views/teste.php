<?php
    $data = ['table'=> 'pagbet_2023_09', 'page' => '1', 
    'fields' => ['candle' => '1.00', 'hour' => '00:00:00', 'date'=> '2023-09-26']];

    $db_name = $_ENV['DB_NAME_AVIATOR'];
    $db_username = $_ENV['DB_USERNAME_AVIATOR'];
    $db_password = $_ENV['DB_PASSWORD_AVIATOR'];
    
    $table = $data['table'];
    $selectFields = 'candle, hour, date';
    $page = $data['page'];
    $whereFields = $data['fields'];
    $limit = 15;
    $offset = $limit * ($page - 1 );
    

    $query = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);
    if(empty($query)){
        $table = 'vazio';
        echo "VAZIOO <br>";
        $whereFields['candle'] = '0';
        $whereFields['hour'] = '00:00:00';
        $whereFields['date'] = '0000-00-00';
        $query = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);  
    }
    echo "Valores da Tabela<br>";
    var_dump($query);

    $selectFields = 'count(*) as count';
    $offset = 0;
    $page_quantity = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);  
    echo "Quantidade de Paginas<br>";
    var_dump($page_quantity);
    
    $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
    $json_data = json_encode($array_data);
    echo "O JSON ESTÁ AQUI EM BAIXO <br>";
    echo $json_data;
    die()
?>