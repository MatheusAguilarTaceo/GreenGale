<?php

namespace app\controllers;

class Aviator{
    public function index(){
        return[
            'views' => 'aviator.php',
            'data' => ['title' => 'Casas de aposta', 'css' => 'aviator.css']
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


    public function pagbet(){
        return [
            'views' => "pagbet.php",
            'data' => ['title' => "Statistics"]
        ];
    }

    public function tablePageFilter(){   
        $json = file_get_contents('php://input');
        $data =  json_decode($json, true);
        $dbName = '';
        $dbUsername = '';
        $dbPassword = '';
        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 1, 4)));
        $page = $data['page'];
        $whereFields = $data['fields'];

        $selectFields = 'candle, hour';
        $limit = 15;
        $offset = $limit * ($page - 1);
        
        $query = findTableData($dbName, $dbUsername, $dbPassword, $table, $selectFields, $whereFields, $limit, $offset);   
        if(empty($query)){
            $table = 'vazio';
            $whereFields['candle'] = '0';
            $whereFields['hour'] = '00:00:00';
            $whereFields['date'] = '0000-00-00';
            $query = findTableData($dbName, $dbUsername, $dbPassword, $table, $selectFields, $whereFields, $limit, $offset);   
        }
        $selectFields = 'count(*) as count';
        $offset = 0;
        $page_quantity = findTableData($dbName, $dbUsername, $dbPassword, $table, $selectFields, $whereFields, $limit, $offset);

        $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
        $json_data = json_encode($array_data);
        echo $json_data;
    }
}