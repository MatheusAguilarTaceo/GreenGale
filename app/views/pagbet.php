<?php
// $data = ['page' => '14', 'fields' => ['candle' => '15', 'hours' => '%h%']];
// $selectFields = 'candle, hours';
// $whereFields = $data['fields'];
// $limit = 15;
// $offset = $limit * ($data["page"] - 1 );
// echo("OFFSET AQUI - $offset<br>");
// $table = findTableData('new_table', $selectFields, $whereFields, $limit, $offset);
// var_dump($table);

// $selectFields = 'count(*) as count';
// $offset = 0;
// $page_quantity = findTableData('new_table', $selectFields, $whereFields, $limit, $offset);   
// var_dump($page_quantity);
// // die();
// $array_data = ['table' => $table, 'page_quantity' => [$page_quantity[0]['count']]];
// $json_data = json_encode($array_data);
// echo $json_data;
?>

<section  id ='table-content-1'>
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
        <!-- <input class ="main-btn-time"type="text" id="hora" maxlength="5" placeholder ="HH:MM"oninput="formatarHora(this)"> -->
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
