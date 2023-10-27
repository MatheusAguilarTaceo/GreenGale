<?php

namespace app\controllers;

class Aviator{
    public function index(){
        return[
            'views' => 'aviator.php',
            'data' => ['title-menu' => 'Histórico das casas de apostas | Aviator',
            'title-page' => 'Aviator Histórico',
            'css' => 'aviator.css']
        ];
    }

    public function show($param){
        $key = array_keys($param)[0];

        $value = $param[$key];
        if(method_exists($this,$value)){
            return $this->$value();      
        }
        return redirect(PUBLIC_HTML.'index.php/aviator');
    }



    public function tableFilter(){   
        $json = file_get_contents('php://input');
        $data =  json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];
        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $page = $data['page'];
        $where_fields = $data['fields'];

        $select_fields = 'candle, hour';
        $limit = 12;
        $offset = $limit * ($page - 1);
        
        $query = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $limit, $offset);   
        if(empty($query)){
            $table = 'vazio';
            $where_fields['candle'] = '0';
            $where_fields['hour'] = '00:00:00';
            $where_fields['date'] = '0000-00-00';
            $query = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $limit, $offset);   
        }
        $select_fields = 'count(*) as count';
        $offset = 0;
        $quantity_of_candles = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $limit, $offset);

        $array_data = ['table' => $query, 'quantity_of_candles' => $quantity_of_candles[0]['count']];
        $json_data = json_encode($array_data);
        echo $json_data;
    }

    public function graphicFilterAll(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $date = $data['date'];


        $selec_field = 'count(*) as count';

        // Velas Azuis
        $where_fields = ['date' => [$date], 'candle' => ['2']];
        $operator = ['=', '<'];
        $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
        
        // Velas roxas
        $where_fields = ['date' => [$date], 'candle' => ['2', '10']];
        $operator = ['=', '>=', '<'];
        $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
        
        // Velas rosas
        $where_fields = ['date' => [$date], 'candle' => ['10']];
        $operator = ['=', '>='];
        $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $selec_field, $operator);

        $data = ['blue' => $blue_candles->count, 'purple' => $purple_candles->count, 'pink' => $pink_candles->count];
        $json = json_encode($data);
        echo $json;
    }

    public function graphicFilterBy(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];
        
        $select_fields = 'count(*) as count';
        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $date = $data['date'];
        $candle = $data['candle'];
        $hour = $data['hour'];
        $blue_candles = 0;
        $purple_candles = 0;
        $pink_candles = 0;
        if($candle < 2){
            // Velas Azuis
            $where_fields = ['date' => [$date], 'candle' => [$candle, '2'], 'hour' => [$hour]];
            $operator = ['=', '>=', '<', '>='];
            $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            // Velas Roxas
            $where_fields = ['date' => [$date], 'candle' => ['2', '10'], 'hour' => [$hour]];
            $operator = ['=', '>=', '<', '>='];
            $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            // Velas Rosas
            $where_fields = ['date' => [$date], 'candle' => ['10'], 'hour' => [$hour]];
            $operator = ['=', '>=', '>='];
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            $data = ['blue' => $blue_candles->count, 'purple' => $purple_candles->count, 'pink' => $pink_candles->count];
        }
        else if($candle < 10){
            // Velas Roxas
            $where_fields = ['date' => [$date], 'candle' => [$candle, '10'], 'hour' => [$hour]];
            $operator = ['=', '>=', '<', '>=']; 
            $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            // Velas Rosas
            $where_fields = ['date' => [$date], 'candle' => [$candle], 'hour' => [$hour]];
            $operator = ['=', '>=', '>='];      
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            $data = ['blue' => $blue_candles, 'purple' => $purple_candles->count, 'pink' => $pink_candles->count];
        }else{
            // Velas Rosas
            $where_fields = ['date' => [$date], 'candle' => [$candle], 'hour' => [$hour]];
            $operator = ['=', '>=', '>='];   
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
            $data = ['blue' => $blue_candles, 'purple' => $purple_candles, 'pink' => $pink_candles->count]; 
        }
        $json = json_encode($data);
        echo $json;
    }

    public function candleRareFilter(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

        $select_fields = 'candle, hour';
        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $date = $data['date'];
        $where_fields = ['date' => [$date]];
        $operator = ['='];
        $result = findBy($db_name, $db_username, $db_password, $table, $where_fields, $select_fields, $operator);
        $result = array_reverse($result);
        $candle_800 = true;
        $candle_400 = true;
        $candle_200 = true;
        $candle_100 = true;
        $candle_50 = true;
        $candle_10 = true;
        $counter = 0;
        $data = [];
        for($i = 0; $i < count($result); $i++){
            if($result[$i]->candle >= 10 && $candle_10){
                $candle_10 = false;
                // $data['candle_10']['quantity'] = $counter;
                // $data['candle_10']['hour'] = $result[$i]->hour;
                // $data[0]['candle_rare']['quantity'] = $counter;
                // $data[0]['candle_rare']['hour'] = $result[$i]->hour;
                // $data[0]['candle_rare']['candle'] = $result[$i]->candle;
                
                $data[0] = ['range' => 10, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
            }
            if($result[$i]->candle >= 50 && $candle_50){
                $candle_50 = false;
                $data[1] = ['range' => 50, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
            }
            if($result[$i]->candle >= 100 && $candle_100){
                $candle_100 = false;
                $data[2] = ['range' => 100, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
            }
            if($result[$i]->candle >= 200 && $candle_200){
                $candle_200 = false;
                $data[3] = ['range' => 200, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
            }
            if($result[$i]->candle >= 400 && $candle_400){
                $candle_400 = false;
                $data[4] = ['range' => 400, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
            }
            if($result[$i]->candle >= 800 && $candle_800){
                $candle_800 = false;
                $data[5] = ['range' => 800, 'quantity' => $counter, 'hour' => $result[$i]->hour, 'candle' => $result[$i]->candle];
                break;
            }
            $counter++;
        }
        $json = json_encode($data);
        echo $json;
    }
}