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
        $page_quantity = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $limit, $offset);

        $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
        $json_data = json_encode($array_data);
        echo $json_data;
    }

    public function graphicFilter(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $date = $data['date'];
        // $table = 'pagbet_2023_09';

        // $date = '2023-09-25';

        $selec_field = 'count(*) as count';
        $where_fields = ['date' => [$date], 'candle' => ['2']];
        $operator = ['=', '<'];
        $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
        
        // Velas roxas
        $where_fields = ['date' => [$date], 'candle' => ['2', '10']];
        $operator = ['=', '>=', '<'];
        $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields,$selec_field, $operator);
        
        // Velas rosas
        $where_fields = ['date' => [$date], 'candle' => ['10']];
        $operator = ['=', '<'];
        $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $selec_field, $operator);

        $data = [$blue_candles, $purple_candles, $pink_candles];
        $json = json_encode($data);
        echo $json;
    }
}