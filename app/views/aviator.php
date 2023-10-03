
<?php
    // $data = ['table'=> 'pagbet_2023_09', 'page' => '1', 
    // 'fields' => ['candle' => '1.00', 'hour' => '00:00:00', 'date'=> '2023-09-26']];
    // $selectFields = 'candle, hour, date';
    // $table = $data['table'];
    // $page = $data['page'];
    // $whereFields = $data['fields'];
    // $limit = 15;
    // $offset = $limit * ($page - 1 );

    // $query = findTableData($table, $selectFields, $whereFields, $limit, $offset);
    // if(empty($query)){
    //     $table = 'vazio';
    //     echo "VAZIOO <br>";
    //     $whereFields['candle'] = '0';
    //     $whereFields['hour'] = '00:00:00';
    //     $whereFields['date'] = '0000-00-00';
    //     $query = findTableData( $table, $selectFields, $whereFields, $limit, $offset);   
    // }
    // echo "Valores da Tabela<br>";
    // var_dump($query);

    // $selectFields = 'count(*) as count';
    // $offset = 0;
    // $page_quantity = findTableData($table, $selectFields, $whereFields, $limit, $offset);   
    // echo "Quantidade de Paginas<br>";
    // var_dump($page_quantity);
    
    // $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
    // $json_data = json_encode($array_data);
    // echo "O JSON ESTÁ AQUI EM BAIXO <br>";
    // echo $json_data;
    // die()
?>


<button class="new-table">Nova Tabela</button>
<div class="table-block">
    <section class="table-content" id ='table-content-1'>
        <div>
            <select class="box_filtro">
                <option value="pagbet">PAGBET</option>
                <option value="b2xbet">B2XBET</option>
                <option value="ssgames">SSGAMES</option>
                <option value="betnacional">BETNACIONAL</option>
            </select>
            <input class = "input_filters"   id="date" type="date">
        </div>
        <div>
            <input class="input_filters" type="text" id="candle" placeholder="Vela">
            <input class="input_filters" type="time" id="time" placeholder="Hora">
        </div>
        <table>
            <thead>
                <tr>
                    <th>CANDLE</th>
                    <th>HOURS</th>
                </tr>
            </thead>
            <tbody class="aviatorTb">
                    
            </tbody>
        </table>
        <ul class='tablePagination'>
            <button class = 'tableButton' first-page ="first-page"><<</button>
            <button class = 'tableButton' previous-page ="previous-page"><</button>
            <button class = 'tableButton' id-page ="1">1</button>
            <button class = 'tableButton' id-page ="2">2</button>
            <button class = 'tableButton' id-page ="3">3</button>
            <button class = 'tableButton' id-page ="4">4</button>
            <button class = 'tableButton' id-page ="5">5</button>
            <button class = 'tableButton' data-page ="...">...</button>
            <button class = 'tableButton' next-page ="next-page">></button>
            <button class = 'tableButton' last-page ="last-page">>></button>
        </ul>
    </section>
    <section class="table-content" id ='table-content-2'>
        <div>
            <select class="box_filtro">
                <option value="pagbet">PAGBET</option>
                <option value="b2xbet">B2XBET</option>
                <option value="ssgames">SSGAMES</option>
                <option value="betnacional">BETNACIONAL</option>
            </select>
            <input class = "input_filters"   id="date" type="date">
        </div>
        <div>
            <input class="input_filters" type="text" id="candle" placeholder="Vela">
            <input class="input_filters" type="time" id="time" placeholder="Hora">
        </div>
        <table>
            <thead>
                <tr>
                    <th>CANDLE</th>
                    <th>HOURS</th>
                </tr>
            </thead>
            <tbody class="aviatorTb">
                    
            </tbody>
        </table>
        <ul class='tablePagination'>
            <button class = 'tableButton' first-page ="first-page"><<</button>
            <button class = 'tableButton' previous-page ="previous-page"><</button>
            <button class = 'tableButton' id-page ="1">1</button>
            <button class = 'tableButton' id-page ="2">2</button>
            <button class = 'tableButton' id-page ="3">3</button>
            <button class = 'tableButton' id-page ="4">4</button>
            <button class = 'tableButton' id-page ="5">5</button>
            <button class = 'tableButton' data-page ="...">...</button>
            <button class = 'tableButton' next-page ="next-page">></button>
            <button class = 'tableButton' last-page ="last-page">>></button>
        </ul>
    </section>
    
</div> 
