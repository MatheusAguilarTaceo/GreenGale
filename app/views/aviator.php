

<div class = "contvainer-fluid">
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
                        <select class="box-filters-medium">
                            <option value="pagbet">PAGBET</option>
                            <option value="b2xbet">B2XBET</option>
                            <option value="ssgames">SSGAMES</option>
                            <option value="betnacional">BETNACIONAL</option>
                        </select>
                        <input class = "input-filters-medium"   id="date" type="date">
                    </div>
                    <div>
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
                        <button class = 'tableButton-medium' first-page ="first-page"><<</button>
                        <button class = 'tableButton-medium' previous-page ="previous-page"><</button>
                        <button class = 'tableButton-medium' id-page ="1">1</button>
                        <button class = 'tableButton-medium' id-page ="2">2</button>
                        <button class = 'tableButton-medium' id-page ="3">3</button>
                        <button class = 'tableButton-medium' id-page ="4">4</button>
                        <button class = 'tableButton-medium' id-page ="5">5</button>
                        <button class = 'tableButton-medium' data-page ="...">...</button>
                        <button class = 'tableButton-medium' next-page ="next-page">></button>
                        <button class = 'tableButton-medium' last-page ="last-page">>></button>
                    </ul>
                </section>
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>800x</span>
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
                        <select class="box-filters-medium">
                            <option value="pagbet">PAGBET</option>
                            <option value="b2xbet">B2XBET</option>
                            <option value="ssgames">SSGAMES</option>
                            <option value="betnacional">BETNACIONAL</option>
                        </select>
                        <input class = "input-filters-medium" id="date" type="date">
                    </div>
                    <div>
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
                        <button class = 'tableButton-medium' first-page ="first-page"><<</button>
                        <button class = 'tableButton-medium' previous-page ="previous-page"><</button>
                        <button class = 'tableButton-medium' id-page ="1">1</button>
                        <button class = 'tableButton-medium' id-page ="2">2</button>
                        <button class = 'tableButton-medium' id-page ="3">3</button>
                        <button class = 'tableButton-medium' id-page ="4">4</button>
                        <button class = 'tableButton-medium' id-page ="5">5</button>
                        <button class = 'tableButton-medium' data-page ="...">...</button>
                        <button class = 'tableButton-medium' next-page ="next-page">></button>
                        <button class = 'tableButton-medium' last-page ="last-page">>></button>
                    </ul>
                </section>
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-medium">
                            <span class ='candle-range-medium'>800x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>   
        <div class="content-block">
            <div class="content-house" id="content-house-3">
                <section class="table-content" id ='table-content-3'>
                    <div>
                        <select class="box-filters-small">
                            <option value="pagbet">PAGBET</option>
                            <option value="b2xbet">B2XBET</option>
                            <option value="ssgames">SSGAMES</option>
                            <option value="betnacional">BETNACIONAL</option>
                        </select>
                        <input class = "input-filters-small"   id="date" type="date">
                    </div>
                    <div>
                        <input class="input-filters-small" type="text" id="candle" placeholder="Vela">
                        <input class="input-filters-small" type="time" id="time" placeholder="Hora">
                    </div>
                    <table class="table-dimension-small">
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
                        <button class = 'tableButton-small' first-page ="first-page"><<</button>
                        <button class = 'tableButton-small' previous-page ="previous-page"><</button>
                        <button class = 'tableButton-small' id-page ="1">1</button>
                        <button class = 'tableButton-small' id-page ="2">2</button>
                        <button class = 'tableButton-small' id-page ="3">3</button>
                        <button class = 'tableButton-small' id-page ="4">4</button>
                        <button class = 'tableButton-small' id-page ="5">5</button>
                        <button class = 'tableButton-small' data-page ="...">...</button>
                        <button class = 'tableButton-small' next-page ="next-page">></button>
                        <button class = 'tableButton-small' last-page ="last-page">>></button>
                    </ul>
                </section>
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>800x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-house" id="content-house-4">
                <section class="table-content" id ='table-content-4'>
                    <div>
                        <select class="box-filters-small">
                            <option value="pagbet">PAGBET</option>
                            <option value="b2xbet">B2XBET</option>
                            <option value="ssgames">SSGAMES</option>
                            <option value="betnacional">BETNACIONAL</option>
                        </select>
                        <input class = "input-filters-small"   id="date" type="date">
                    </div>
                    <div>
                        <input class="input-filters-small" type="text" id="candle" placeholder="Vela">
                        <input class="input-filters-small" type="time" id="time" placeholder="Hora">
                    </div>
                    <table class="table-dimension-small">
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
                        <button class = 'tableButton-small' first-page ="first-page"><<</button>
                        <button class = 'tableButton-small' previous-page ="previous-page"><</button>
                        <button class = 'tableButton-small' id-page ="1">1</button>
                        <button class = 'tableButton-small' id-page ="2">2</button>
                        <button class = 'tableButton-small' id-page ="3">3</button>
                        <button class = 'tableButton-small' id-page ="4">4</button>
                        <button class = 'tableButton-small' id-page ="5">5</button>
                        <button class = 'tableButton-small' data-page ="...">...</button>
                        <button class = 'tableButton-small' next-page ="next-page">></button>
                        <button class = 'tableButton-small' last-page ="last-page">>></button>
                    </ul>
                </section>
                <section class ="content-graphic">
                    <div class ="piechart"></div>
                    <div class ="piechart"></div>
                </section>
                <section class = "content-candles-rare">
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>10x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>50x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>100x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>200x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                    </div>
                    <div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>400x</span>
                            <p class ='how-many-candles-ago'>Há 4 velas atrás</p>
                            <span class="last-candle" >10x</span>
                            <p class = 'last-candle-time'>Hora aqui</p>
                        </div>
                        <div class="candles-rare-small">
                            <span class ='candle-range-small'>800x</span>
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

<input type="text">
