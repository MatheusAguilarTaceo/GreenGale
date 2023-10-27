

<div class = "">
    <section class= "info-aviator">
        <h1>Sobre o jogo</h1>
        <!-- <div style=" padding: 20px; text-align: center;"> -->
        <div style="text-align: center">
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
        </div>
    </section>
    <button class="new-table">Nova Tabela</button>
    <section class="aviator-statistics">
        <div class="content-block">
            <div class="content-house" id="content-house-1">
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
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>800x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-house" id="content-house-2">
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
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare">
                            <span class ='candle-range'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare">
                            <span class ='candle-range'>800x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>   
    </section>
    
</div>
