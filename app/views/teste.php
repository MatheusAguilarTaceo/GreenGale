

<?php
    // // tableFilter()
    // $data = ['table'=> 'pagbet_2023_09', 'page' => '1', 
    // 'fields' => ['candle' => '10.00', 'hour' => '00:00:00', 'date'=> '2023-09-25']];

    // $db_name = $_ENV['DB_NAME_AVIATOR'];
    // $db_username = $_ENV['DB_USERNAME_AVIATOR'];
    // $db_password = $_ENV['DB_PASSWORD_AVIATOR'];
    
    // $table = $data['table'];
    // $selectFields = 'candle, hour, date';
    // $page = $data['page'];
    // $whereFields = $data['fields'];
    // $limit = 15;
    // $offset = $limit * ($page - 1 );
    

    // $query = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);
    // if(empty($query)){
    //     $table = 'vazio';
    //     echo "VAZIOO <br>";
    //     $whereFields['candle'] = '0';
    //     $whereFields['hour'] = '00:00:00';
    //     $whereFields['date'] = '0000-00-00';
    //     $query = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);  
    // }
    // echo "Valores da Tabela<br>";
    // var_dump($query);

    // $selectFields = 'count(*) as count';
    // $offset = 0;
    // $page_quantity = findTableData($db_name, $db_username, $db_password, $table, $selectFields, $whereFields, $limit, $offset);  
    // echo "Quantidade de Paginas<br>";
    // var_dump($page_quantity);
    
    // $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
    // $json_data = json_encode($array_data);
    // echo "O JSON ESTÁ AQUI EM BAIXO <br>";
    // echo $json_data;
    // die();
?>

<?php
    // // graphicFilterAll()
    // $db_name = $_ENV['DB_NAME_AVIATOR'];
    // $db_username = $_ENV['DB_USERNAME_AVIATOR'];
    // $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

    // $table = 'pagbet_2023_09';

    // $date = '2023-09-25';
    // // Velas azuis
    // $selec_field = 'count(*) as count';
    // $where_fields = ['date' => [$date], 'candle' => ['2']];
    // $operator = ['=', '<'];
    // $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
    
    // // Velas roxas
    // $where_fields = ['date' => [$date], 'candle' => ['2', '10']];
    // $operator = ['=', '>=', '<'];
    // $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
    
    // // Velas rosas
    // $where_fields = ['date' => [$date], 'candle' => ['10']];
    // $operator = ['=', '>='];
    // $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $selec_field, $operator);
    // echo "<br>";
    // $data = [$blue_candles, $purple_candles, $pink_candles];
    // $json = json_encode($data);
    // print_r($json);
?>

<?php
    // graphicFilterBy
    // $json = file_get_contents('php://input');
    // $data = json_decode($json, true);

    // $db_name = $_ENV['DB_NAME_AVIATOR'];
    // $db_username = $_ENV['DB_USERNAME_AVIATOR'];
    // $db_password = $_ENV['DB_PASSWORD_AVIATOR'];
    
    // $select_fields = 'count(*) as count';
    // $table = 'pagbet_2023_09';
  
    // $date = '2023-09-25';
    // $candle = '1';
    // $hour = '00:00:00';
    // $blue_candles = 0;
    // $purple_candles = 0;
    // $pink_candles = 0;
    // if($candle < 2){
    //     // Velas Azuis
    //     $where_fields = ['date' => [$date], 'candle' => [$candle, '2'], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '<', '>='];
    //     $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     // Velas Roxas
    //     $where_fields = ['date' => [$date], 'candle' => ['2', '10'], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '<', '>='];
    //     $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     // Velas Rosas
    //     $where_fields = ['date' => [$date], 'candle' => ['10'], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '>='];
    //     $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     $data = ['blue' => $blue_candles->count, 'purple' => $purple_candles->count, 'pink' => $pink_candles->count];
    // }
    // else if($candle < 10){
    //     // Velas Roxas
    //     $where_fields = ['date' => [$date], 'candle' => [$candle, '10'], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '<', '>=']; 
    //     $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     // Velas Rosas
    //     $where_fields = ['date' => [$date], 'candle' => [$candle], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '>='];      
    //     $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     $data = ['blue' => $blue_candles, 'purple' => $purple_candles->count, 'pink' => $pink_candles->count];
    // }else{
    //     // Velas Rosas
    //     $where_fields = ['date' => [$date], 'candle' => [$candle], 'hour' => [$hour]];
    //     $operator = ['=', '>=', '>='];   
    //     $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
    //     $data = ['blue' => $blue_candles, 'purple' => $purple_candles, 'pink' => $pink_candles->count]; 
    // }
    // $json = json_encode($data);
    // echo $json;
?>

<?php 
// // candleRareFilter
// $db_name = $_ENV['DB_NAME_AVIATOR'];
// $db_username = $_ENV['DB_USERNAME_AVIATOR'];
// $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

// $select_fields = 'candle, hour';
// $table = 'pagbet_2023_09';
// $date = '2023-09-25';
// $where_fields = ['date' => [$date]];
// $operator = ['='];
// $result = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);

// $candle_800 = true;
// $candle_400 = true;
// $candle_200 = true;
// $candle_100 = true;
// $candle_50 = true;
// $candle_10 = true;
// $counter = 0;
// $data = [];
// var_dump($result);
// for($i = 0; $i < count($result); $i++){
//     if($result[$i]->candle >= 800 && $candle_800){
//         $candle_800 = false;
//         $data['candle_800']['quantity'] = $counter;
//         $data['candle_800']['hour'] = $result[$i]->hour;
//         break; 
//     }
//     if($result[$i]->candle >= 400 && $candle_400){
//         $candle_400 = false;
//         $data['candle_400']['quantity'] = $counter;
//         $data['candle_400']['hour'] = $result[$i]->hour;
//     }
//     if($result[$i]->candle >= 200 && $candle_200){
//         $candle_200 = false;
//         $data['candle_200']['quantity'] = $counter;
//         $data['candle_200']['hour'] = $result[$i]->hour;
//     }
//     if($result[$i]->candle >= 100 && $candle_100){
//         $candle_100 = false;
//         $data['candle_100']['quantity'] = $counter;
//         $data['candle_100']['hour'] = $result[$i]->hour; 
//     }
//     if($result[$i]->candle >= 50 && $candle_50){
//         $candle_50 = false;
//         $data['candle_50']['quantity'] = $counter;
//         $data['candle_50']['hour'] = $result[$i]->hour;
//     }
//     if($result[$i]->candle >= 10 && $candle_10){
//         $candle_10 = false;
//         $data['candle_10']['quantity'] = $counter;
//         $data['candle_10']['hour'] = $result[$i]->hour;
//     }
//     $counter++;
// }
// $json = json_encode($data);
// echo $json;
?>

<?php    
// // URL do seu servidor local
// $serverUrl = 'http://localhost:8000/account';

// // Dados em formato JSON que você deseja enviar
// $data = json_encode(array(
//     'field' => 'name',
//     'value' => 'Matheus',
// ));

// // Configuração da solicitação POST
// $options = array(
//     'http' => array(
//         'method'  => 'POST',
//         'header'  => 'Content-type: application/json',
//         'content' => $data
//     )
// );

// $context  = stream_context_create($options);
// $validate = file_get_contents($serverUrl, false, $context);
// var_dump($validate); 
// $json = json_decode($validate);
// var_dump($json);
    
?>
<pre class='xdebug-var-dump' dir='ltr'>
<small>C:\Users\theus\Documents\Projetos_PHP\greengale\GreenGale\app\database\select.php:73:</small>
<b>object</b>(<i>mysqli_result</i>)[<i>46</i>]
  <i>public</i> 'current_field' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>0</font>
  <i>public</i> 'field_count' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>2</font>
  <i>public</i> 'lengths' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  <i>public</i> 'num_rows' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>0</font>
  <i>public</i> 'type' <font color='#888a85'>=&gt;</font> <small>int</small> <font color='#4e9a06'>0</font>
</pre>