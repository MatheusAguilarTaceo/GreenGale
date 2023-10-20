

<div class = "container-fluid">
    <section class= "info-aviator">
        <h1>Sobre o jogo</h1>
        <div class = content>
            <div class = "content-text">
                <img src=<?php echo IMGS."png/aviator-logo.png"?> alt="aviator-logo">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, quia pariatur. Veniam, ad sapiente culpa saepe fugit dicta doloribus animi expedita pariatur dolorum minima rerum ex nemo ab illum reiciendis?</p>
            </div>
            <div class = "content-text">
               <img src=<?php echo IMGS."png/spribe-logo.png"?> alt="spribe-logo">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, quia pariatur. Veniam, ad sapiente culpa saepe fugit dicta doloribus animi expedita pariatur dolorum minima rerum ex nemo ab illum reiciendis?</p>
            </div>
        </div>
        <div class = "content-image">
           <img src=<?php echo IMGS."png/aviator-amostra.png"?> alt="aviator-logo">
        </div>
    </section>
    <!-- <button class="new-table">Nova Tabela</button> -->
    <div class="aviator-statistics">
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
                <tbody class="candle-tbody">
    
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
        <section class = "content-graphic">
            <div class = 'piechart' id="piechart-1" ></div>
            <div class = 'piechart' id="piechart-2" ></div>
        </section>
        <section class = "content-candles-rare">
            <div class = 'teste'>
                <div class="candles-rare ">
                    <span >10X</span>
                </div>
                <div class="candles-rare">
                <span>50X</span>
                </div>
            </div>
            <div class = 'teste'>
                <div class="candles-rare">
                <span>100X</span>
                </div>        
                <div class="candles-rare">
                <span>200X</span>
                </div>
            </div>
            <div class = 'teste'>
                <div class="candles-rare">
                <span>400X</span>
                </div>
                <div class="candles-rare">
                <span>800X</span>
                </div>
            </div>
           
        </section>   
    </div>
</div>
