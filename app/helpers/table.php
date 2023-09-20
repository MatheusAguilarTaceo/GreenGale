<?php 
    // Talvez eu use isto
    function tablePages($query){
      $size =  count($query);
      $page_list = array();
      $page_data = array();
      $count = 0;
      $indice = 0;
       foreach ($query as $item){
            $page_data[$count] = $item;
            $count +=1;
            if ($count == 15){
                $page_list[$indice] = $page_data;
                $count = 0;
                $indice +=1;
            };
       };
      return $page_list;
    };

?>