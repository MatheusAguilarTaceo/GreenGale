
<?php
    // $data = ['table'=> 'pagbet_2023_09', 'page' => '1', 
    // 'fields' => ['candle' => '1.00', 'hour' => '00:00:00', 'date'=> '2023-09-25']];
    // $selectFields = 'candle, hour, date';
    // $table = $data['table'];
    // $page = $data['page'];
    // $whereFields = $data['fields'];
    // $limit = 15;
    // $offset = $limit * ($page - 1 );
    // echo $table.'<br>';
    // echo $selectFields.'<br>';
    // var_dump($whereFields).'<br>';
    // echo $limit.'<br>';
    // echo $offset.'<br>';
    // $query = findTableData($table, $selectFields, $whereFields, $limit, $offset);
    // var_dump($query);

    // $selectFields = 'count(*) as count';
    // $offset = 0;
    // $page_quantity = findTableData($table, $selectFields, $whereFields, $limit, $offset);   
    // var_dump($page_quantity);
    // $array_data = ['table' => $query, 'page_quantity' => [$page_quantity[0]['count']]];
    // $json_data = json_encode($array_data);
    // echo "O JSON ESTÁ AQUI EM BAIXO <br>";
    // echo $json_data;
    // die()
?>


<button class="new-table">Nova Tabela</button>
<div class="table-block">
    <section class="content-table" id ='table-content-1'>
        <div>
            <select id="boxfiltro">
                <option value="pagbet">PAGBET</option>
                <option value="b2xbet">B2XBET</option>
                <option value="ssgames">SSGAMES</option>
                <option value="betnacional">BETNACIONAL</option>
            </select>
            <input class = "main-btn-vela"   id="date" type="date">
        </div>
        <div>
            <input class="main-btn-vela" type="text" id="candle" placeholder="Vela">
            <input class="main-btn-vela" type="time" id="time" placeholder="Hora">
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
    <section class="content-table" id ='table-content-2'>
        <div>
            <select id="boxfiltro">
                <option value="pagbet">PAGBET</option>
                <option value="b2xbet">B2XBET</option>
                <option value="ssgames">SSGAMES</option>
                <option value="betnacional">BETNACIONAL</option>
            </select>
            <input class = "main-btn-vela"   id="date" type="date">
        </div>
        <div>
            <input class="main-btn-vela" type="text" id="candle" placeholder="Vela">
            <input class="main-btn-vela" type="time" id="time" placeholder="Hora">
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
    <!-- <section  id ='table-content-3'>
        <div>
            <select id="boxfiltro" onchange="redirecionar()">
                <option value="">Plataforma</option>
                <option value="b2xbet.html">B2XBET</option>
                <option value="pagina2.html">Página 2</option>
                <option value="pagina3.html">Página 3</option>
            </select>
            <input class = "main-btn-vela"   id="date" type="date">
        </div>
        <div>
            <input class="main-btn-vela" type="text" id="candle" placeholder="Vela">
            <input class="main-btn-vela" type="time" id="time" placeholder="Hora">
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
    </section> -->
</div> 
