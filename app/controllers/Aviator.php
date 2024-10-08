<?php

namespace app\controllers;

class Aviator{
    public function index(){
        return[
            'views' => 'aviator.php',
            'data' => [ 'title-menu' => 'Histórico das casas de apostas | Aviator',
                        'title-page' => 'Aviator Histórico',
                        'css' => 'aviator.css',
                        'js' => 'aviator.js']
        ];
    }

    // public function show($param){ // futuramente esta função vais ser reutilizada 
    //     $key = array_keys($param)[0];

    //     $value = $param[$key];
    //     if(method_exists($this,$value)){
    //         return $this->$value();      
    //     }
    //     return redirect(PUBLIC_HTML.'index.php/aviator');
    // }

    public function dataController(){
        if(isset($_SESSION[LOGGED])){
            $msg = "Limte de filtros atingdos!"; 
            $limit = 4;
            $time = 4000;
            $list_houses =  [['house' => 'b2xbet',   'href' => 'https://www.b2xbet.net/pb/'],
                             ['house' => 'goldebet', 'href' => 'https://goldebet.com//register?ref=theusaguilar2@gmail.com'],
                             ['house' => 'betano',   'href' => '#']
                            ];
            
            echo json_encode(['limit' => $limit, 'msg' => $msg, 'time' => $time,'list_houses' => $list_houses]);
            return;
        }else{
            $limit = 2;
            $msg = "Limte de filtros atingdos! cadastre-se para adicionar mais"; 
            $time = 4000;
            $list_houses =  [['house' => 'b2xbet',   'href' => 'https://www.b2xbet.net/pb/'],
                             ['house' => 'goldebet', 'href' => 'https://goldebet.com//register?ref=theusaguilar2@gmail.com'],
                             ['house' => 'betano',   'href' => '#']
                            ];
            echo json_encode(['limit' => $limit, 'msg' => $msg, 'time' => $time, 'list_houses' => $list_houses]);
            return;
        }
    }

    public function tableFilter(){   
        $json = file_get_contents('php://input');
        $data =  json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 2, 3)));
        
        $select_fields = 'candle, date_time';
        $where_fields = $data['fields'];
        
        $time_zone = new \DateTimeZone($data['time_zone']);
        $date_time_str = implode('', $where_fields['date_time']);
        
        $date_time_large = new \DateTime($date_time_str, $time_zone);
        $date_time_large->setTime(0,0,0);
        $date_time_large->setTimezone(new \DateTimeZone('UTC'));
        $date_time_large = $date_time_large->format('Y-m-d H:i:s');


        $date_time_small = new \DateTime($date_time_str, $time_zone);
        $date_time_small->modify('+1 hour');
        $date_time_small->setTimezone(new \DateTimeZone('UTC'));
        $date_time_small = $date_time_small->format('Y-m-d H:i:s');


        $where_fields['date_time'] = [$date_time_large, $date_time_small];

        $operator = ['>=', '<', '>='];

        $page = $data['page'];
        $limit = 12;
        $offset = $limit * ($page - 1);

        $data_table = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $operator, $limit, $offset);   
        if($data_table['status']){
            foreach($data_table['result'] as $value){
                $utc = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $utc->setTimezone($time_zone);
                $value->date_time = $utc->format('H:i:s');

            }
        }

        if(!$data_table['status']){
            $table = 'vazio';
            $where_fields['candle'] = ['0'];
            $where_fields['date_time'] = ['0000-00-00 00:00:00'];
            $operator = ['=', '='];
            $data_table = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $operator, $limit, $offset);   
            if($data_table['result']){
                foreach($data_table['result'] as $value){
                    $value->date_time = '00:00:00';
    
                }
            }
        }
        $select_fields = 'count(*) as count';
        $offset = 0;
        $quantity_of_candles = findTableData($db_name, $db_username, $db_password, $table, $select_fields, $where_fields, $operator, $limit, $offset); 
        $array_data = ['table' => $data_table['result'], 'quantity_of_candles' => $quantity_of_candles['result'][0]->count];
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
        $table = implode('_', array_reverse(array_splice($table, 2, 3)));
        $select_field = 'count(*) as count';
        $where_fields = $data['fields'];
        

        $time_zone = new \DateTimeZone($data['time_zone']);
        $date_time_str = implode('', $where_fields['date_time']);

        $date_time_large = new \DateTime($date_time_str, $time_zone); 
        $date_time_large->setTime(0,0,0);
        $date_time_large->setTimezone(new \DateTimeZone('UTC'));
        $date_time_large = $date_time_large->format('Y-m-d H:i:s');

        $date_time_small  = new \DateTime($date_time_str, $time_zone);
        $date_time_small->modify('+1 hours');
        $date_time_small->setTimezone(new \DateTimeZone('UTC'));
        $date_time_small = $date_time_small->format('Y-m-d H:i:s');

        // Velas Azuis
        $where_fields['date_time'] = [$date_time_large, $date_time_small]; 
        $where_fields['candle'] =  ['2'];
        $operator = ['>=', '<', '<'];
        $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_field);
        
        // Velas roxas        
        $where_fields['candle'] =  ['2', '10'];
        $operator = ['>=', '<', '>=', '<'];
        $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_field);
        
        // Velas rosas
        $where_fields['candle'] =  ['10'];
        $operator = ['>=', '<', '>='];
        $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_field);
        if(!$blue_candles['status'] || !$purple_candles['status'] || !$pink_candles['status']){
            echo  json_encode(['blue' => 0, 'purple' => 0, 'pink' => 0]);
            return;
        }
        $data = ['blue' => $blue_candles['result']->count, 'purple' => $purple_candles['result']->count, 'pink' => $pink_candles['result']->count];
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
        $where_fields = $data['fields'];

        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 2, 3)));
        
        $time_zone  = new \DateTimeZone($data['time_zone']);
        $date_time_str = implode('', $where_fields['date_time']);
        
        $date_time_large = new \DateTime($date_time_str, $time_zone);
        $date_time_large->setTime(0,0,0);
        $date_time_large->setTimeZone(new \DateTimeZone('UTC'));
        $date_time_large = $date_time_large->format('Y-m-d H:i:s');

        $date_time_small = new \DateTime($date_time_str, $time_zone);
        $date_time_small->modify('+1 hours');
        $date_time_small->setTimezone(new \DateTimeZone('UTC'));
        $date_time_small = $date_time_small->format('Y-m-d H:i:s');

        
        $candle = $where_fields['candle'][0];
        $blue_candles = 0;
        $purple_candles = 0;
        $pink_candles = 0;

        $where_fields = $data['fields'];
        $where_fields['date_time'] = [$date_time_large, $date_time_small];
        
        if($candle < 2){
            // Velas Azuis
            $where_fields['candle']  = [$candle,'2'];
            $operator = ['>=', '<', '>=', '<'];
            $blue_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields);

            // Velas Roxas
            $where_fields['candle']  = ['2','10'];
            $operator = ['>=', '<', '>=', '<'];
            $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields);
            
            // Velas Rosas
            $where_fields['candle'] = ['10'];
            $operator = ['>=', '<', '>='];
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields);
            
            if(!$blue_candles['status'] || !$purple_candles['status'] || !$pink_candles['status']){
                echo  json_encode(['blue' => 0, 'purple' => 0, 'pink' => 0]);
                return;
            }
            $data = ['blue' => $blue_candles['result']->count, 'purple' => $purple_candles['result']->count, 'pink' => $pink_candles['result']->count];
        }
        else if($candle < 10){
            // Velas Roxas
            $where_fields = ['date_time' => [$date_time_large, $date_time_small], 'candle' => [$candle, '10']];
            $operator = ['>=', '<', '>=', '<']; 
            $purple_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields);
            
            // Velas Rosas
            $where_fields = ['date_time' => [$date_time_large, $date_time_small], 'candle' => ['10']];
            $operator = ['>=', '<', '>='];      
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator,  $select_fields);
            
            if(!$purple_candles['status'] || !$pink_candles['status']){
                echo  json_encode(['blue' => 0, 'purple' => 0, 'pink' => 0]);
                return;
            }

            $data = ['blue' => $blue_candles, 'purple' => $purple_candles['result']->count, 'pink' => $pink_candles['result']->count];
        }else{
            // Velas Rosas
            $where_fields = ['date_time' => [$date_time_large, $date_time_small], 'candle' => [$candle]];
            $operator = ['>=', '<', '>='];   
            $pink_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields);

            if(!$pink_candles['status']){
                echo  json_encode(['blue' => 0, 'purple' => 0, 'pink' => 0]);
                return;
            }
            $data = ['blue' => $blue_candles, 'purple' => $purple_candles, 'pink' => $pink_candles['result']->count]; 
        }

        $json = json_encode($data);
        echo $json;
        return;
    }

    public function candleRareFilter(){

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $db_name = $_ENV['DB_NAME_AVIATOR'];
        $db_username = $_ENV['DB_USERNAME_AVIATOR'];
        $db_password = $_ENV['DB_PASSWORD_AVIATOR'];

        $table =  explode('/', $data['table']);
        $table = implode('_', array_reverse(array_splice($table, 2, 3)));
        $select_fields = 'candle, date_time';

        $where_fields = $data['fields'];
        
        $time_zone = new \DateTimeZone($data['time_zone']);
        $date_time_str = implode('', $where_fields['date_time']);

        $date_time_large = new \DateTime($date_time_str, $time_zone);
        $date_time_large->setTime(0,0,0);
        $date_time_large->setTimezone(new \DateTimeZone('UTC'));
        $date_time_large = $date_time_large->format('Y-m-d H:i:s');

        $date_time_small = new \DateTime($date_time_str, $time_zone);
        $date_time_small->modify('+1 hours');
        $date_time_small->setTimeZone(new \DateTimeZone('UTC'));
        $date_time_small = $date_time_small->format('Y-m-d H:i:s');

        $where_fields['date_time'] = [$date_time_large, $date_time_small];
        $operator = ['>=', '<'];
        $order_by = 'order by id desc';

        $data_candles = findBy($db_name, $db_username, $db_password, $table, $where_fields, $operator, $select_fields, $order_by);
        
        $data = [];
        if(!$data_candles['status'] || !$data_candles['result']){
            for( $i = 0; $i < 6; $i++){
                $data[] = ['range' => 0, 'quantity' => 0, 'hour' => '00:00:00', 'candle' => '00.00'];
            }
            echo json_encode($data);
            return;
        }
    
        $data_candles = $data_candles['result']; 
        $candle_800 = true;
        $candle_400 = true;
        $candle_200 = true;
        $candle_100 = true;
        $candle_50 = true;
        $candle_10 = true;
        $counter = 0;
        foreach($data_candles as $value){
            if($value->candle >= 10 && $candle_10){
                $candle_10 = false;                
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[0] = ['range' => 10, 'quantity' => $counter, 'hour' => $hour, 'candle' => $value->candle];
            }
            if($value->candle >= 50 && $candle_50){
                $candle_50 = false;
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[1] = ['range' => 50, 'quantity' => $counter, 'hour' =>$hour, 'candle' => $value->candle];
            }
            if($value->candle >= 100 && $candle_100){
                $candle_100 = false;
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[2] = ['range' => 100, 'quantity' => $counter, 'hour' =>$hour, 'candle' => $value->candle];
            }
            if($value->candle >= 200 && $candle_200){
                $candle_200 = false;
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[3] = ['range' => 200, 'quantity' => $counter, 'hour' =>$hour, 'candle' => $value->candle];
            }
            if($value->candle >= 400 && $candle_400){
                $candle_400 = false;
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[4] = ['range' => 400, 'quantity' => $counter, 'hour' =>$hour, 'candle' => $value->candle];
            }
            if($value->candle >= 800 && $candle_800){
                $candle_800 = false;
                $hour = new \DateTime($value->date_time, new \DateTimeZone('UTC'));
                $hour->setTimeZone($time_zone);
                $hour = $hour->format('H:i:s');
                $data[5] = ['range' => 800, 'quantity' => $counter, 'hour' =>$hour, 'candle' => $value->candle];
                break;
            }
            $counter++;
        }
        $json = json_encode($data);
        echo $json;
        return;
    }
}