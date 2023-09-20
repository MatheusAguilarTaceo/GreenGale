<?php

namespace app\controllers;

class Aviator{
    public function index(){
        return[
            'views' => 'aviator.php',
            'data' => ['title' => 'Casas de aposta']
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

        $selectFields = 'candle, hours';
        $whereFields = $data['fields'];
        $limit = 15;
        $offset = $limit * ( $data['page'] - 1);
        
        $table = findTableData('new_table', $selectFields, $whereFields, $limit, $offset);   
        
        $selectFields = 'count(*) as count';
        $offset = 0;
        $page_quantity = findTableData('new_table', $selectFields, $whereFields, $limit, $offset);

        $array_data = ['table' => $table, 'page_quantity' => [$page_quantity[0]['count']]];
        $json_data = json_encode($array_data);
        echo $json_data;
    }
}
//$page_quantity[0]['count']