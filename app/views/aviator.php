

<div class = "container-fluid">
    <section class= "info-aviator">
        <h1>Sobre o jogo</h1>
            <div class = content>
                <div class = "content-text">
                    <img src=<?php echo IMGS."png/aviator-logo.png"?> alt="aviator-logo">
                    <h2>O que é o Aviator?</h2>
                    <p>Aviator é um novo tipo de jogo multiplayer social que consiste em uma curva crescente que pode bater a qualquer momento.</p>
                    <p>Quando a rodada começa, uma escala de multiplicador começa a crescer. Jogador deve sacar antes da sorte avião voa para longe.</p>
                </div>
                <div class = "content-text">
                   <img src=<?php echo IMGS."png/spribe-logo.png"?> alt="spribe-logo">
                   <h2>Quem criou o jogo Aviator?</h2>
                   <p>A empresa internacional Spribe foi a primeira a atender às demandas do público na área de entretenimento de azar, que desejava jogos mais modernos.</p> 
                   <p>Tendo estudado a tarefa de forma abrangente, os designers criaram em 2019 um produto exclusivo chamado Aviator.</p>
                </div>
            </div>
            <div class = "content-image">
               <img src=<?php echo IMGS."png/aviator-amostra.png"?> alt="aviator-logo">
            </div>
    </section>
    <button class="new-table">Nova Tabela</button>
    <section class="aviator-statistics">
        <div class="content-block">
            <div class="content-house" id="content-house-1">
                <section class="content-table" >
                    <div class="content-filters">
                        <select class="filters-houses-medium">
                            <option value="pagbet">PAGBET</option>
                            <option value="b2xbet">B2XBET</option>
                            <option value="ssgames">SSGAMES</option>
                            <option value="betnacional">BETNACIONAL</option>
                        </select>
                        <input class = "input-filters-medium"   id="date" type="date">
                    </div>
                    <div class ="content-filters">
                        <input class="input-filters-medium" type="text" id="candle" placeholder="Vela">
                        <input class="input-filters-medium" type="time" id="time" placeholder="Hora">
                    </div>
                    <table class="table-dimension-medium">
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
                        <button class = 'table-button-medium' first-page ="first-page"><<</button>
                        <button class = 'table-button-medium' previous-page ="previous-page"><</button>
                        <button class = 'table-button-medium' id-page ="1">1</button>
                        <button class = 'table-button-medium' id-page ="2">2</button>
                        <button class = 'table-button-medium' id-page ="3">3</button>
                        <button class = 'table-button-medium' id-page ="4">4</button>
                        <button class = 'table-button-medium' id-page ="5">5</button>
                        <button class = 'table-button-medium' data-page ="...">...</button>
                        <button class = 'table-button-medium' next-page ="next-page">></button>
                        <button class = 'table-button-medium' last-page ="last-page">>></button>
                    </ul>
                </section>
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div class ='conteiner-candle-inline'>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                    </div >
                    <div class ='conteiner-candle-inline'>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div class ='conteiner-candle-inline'>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>800x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-time'>Hora aqui</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>   
 
    </section>
    
</div>

