(function googleGraphic(){
    let script = document.createElement('script')

    script.type = 'text/javascript'
    script.src = 'https://www.gstatic.com/charts/loader.js'
    script.onload = () =>{
        google.charts.load('current', {'packages':['corechart']});
        google.setOnLoadCallback(indexData)
    }
    document.body.appendChild(script);
})()



function indexData(){
    let number_of_houses = 1
    let size = 'medium'
    let limit = null
    let msg = null
    let time = null
    let list_houses = null
    let options  = null
    fetch('aviator/data-controller',{
        method: 'POST',
        headers: {"Content-Type": "application/json"}
    })
    .then(response => response.json()) 
    .then(data => {
        limit = data.limit
        msg = data.msg
        time = data.time
        list_houses = data.list_houses
    });

    (function firstTable(){
        let content_house  = initializeData(document.querySelector('#content-house-1'))
        if(window.innerWidth <= 600){
            options = {
            title: 'TITULO AQUI',
            titleTextStyle: {
                fontSize: 20, // Ajuste o tamanho do título conforme necessário
                bold: true,   // Deixa o título em negrito
                color: 'white', // Cor do título
                italic: false, // Não deixa o título em itálico
              },
            width: 340,  // Especifica a largura em pixels
            height: 340, // Especifica a altura em pixels
            colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
            pieHole: 0.4,
            pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 15},
            legend:{ position: 'top', textStyle: { fontSize: 10 } },
            // legend: 'none',
            pieSliceText: 'value',
            pieSliceBorderColor: 'black',
            backgroundColor: {
                fill: 'none',
                stroke: 'black ', // Cor da borda
                strokeWidth: 0.1,   // Largura da borda
            },
            position: 'bottom'            
            }
        }else{   
            options = {
                title: 'TITULO AQUI',
                titleTextStyle: {
                    fontSize: 20, // Ajuste o tamanho do título conforme necessário
                    bold: true,   // Deixa o título em negrito
                    color: 'white', // Cor do título
                    italic: false, // Não deixa o título em itálico
                    },
                width: 200,  // Especifica a largura em pixels
                height: 200, // Especifica a altura em pixels
                colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
                pieHole: 0.4,
                pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 10},
                legend:{ position: 'top', textStyle: { fontSize: 8 } },
                // legend: 'none',
                pieSliceText: 'value',
                pieSliceBorderColor: 'black',
                backgroundColor: {
                    fill: 'none',
                    stroke: 'black ', // Cor da borda
                    strokeWidth: 0.1,   // Largura da borda
                },
                position: 'bottom'            
                }
        }
            content_house.tableFilter()
            content_house.graphicFilterAll()
            content_house.graphicFilterBy()
            content_house.candleRareFilter()
    })();
    
    function modifyClass(id, size, replace_size){  
        let content_house = document.getElementById(`content-house-${id}`)
        let list_elements_medium = content_house.querySelectorAll(`[class *= "${size}"]`)
        list_elements_medium.forEach(value =>{
            value.className = value.className.replace(size, replace_size)
        })
    }

    (function createHouse(){
        function contentHouse(){     
            number_of_houses++
            let content_house =  document.createElement('div')
            content_house.className = 'content-house'
            content_house.id = `content-house-${number_of_houses}`
            if(window.innerWidth > 730){
                if(number_of_houses % 2 == 0){
                    modifyClass(number_of_houses-1, size, 'small' )
                    size = 'small'
                    let previous_content_house = document.getElementById(`content-house-${number_of_houses-1}`)
                    previous_content_house.insertAdjacentElement('afterend', content_house)
                }else{
                    size = 'medium'
                    let content_block = document.createElement('div')
                    content_block.className = 'content-block'
                    let aviator_statistics  = document.querySelector('.aviator-statistics')
                    aviator_statistics.appendChild(content_block)
                    content_block.appendChild(content_house)
                }
            }else{
                let previous_content_house = document.getElementById(`content-house-${number_of_houses-1}`)
                previous_content_house.insertAdjacentElement('afterend', content_house)
            }
            return content_house
        }

        let btn_create = document.querySelector('#btn-create')
        btn_create.addEventListener('click', () =>{
            if(number_of_houses  == limit){
                showMessage(msg, time)
                return 
            } 
            let content_house = contentHouse()

            let new_house = createStructure(content_house)
            new_house.tableStructure()
            new_house.graphicStructure()
            new_house.candleRareStructure()

            new_house = initializeData(content_house)
            new_house.tableFilter()
            new_house.graphicFilterAll()
            new_house.graphicFilterBy()
            new_house.candleRareFilter()
        })
    })();

    (function deleteHouse(){   
        let btn_delete = document.querySelector('#btn-delete')
        btn_delete.addEventListener('click', () =>{
            let drop_house = document.querySelector(`#content-house-${number_of_houses}`)
            drop_house.remove()
            number_of_houses--
            if(number_of_houses % 2 == 0 ){
                size = 'small'
            }else{
                modifyClass(number_of_houses, size, 'medium')
                size = 'medium'
            }
        })
    })();

    
    function createStructure(content_house){
        function tableStructure(){
            let content_table = document.createElement('section')
            content_table.className = 'content-table'  
            content_house.appendChild(content_table)  

            let interaction_buttons = document.createElement('div')
            interaction_buttons.className = 'interaction-buttons';
            content_table.appendChild(interaction_buttons)

            let reload_button = document.createElement('button')
            reload_button.className = 'reload-button'
            content_table.appendChild(reload_button)

            let img_reload = document.createElement('img')
            img_reload.src = 'assets/img/png/rotate-arrow.png'
            img_reload.alt = 'recarregar-pagina'
            reload_button.appendChild(img_reload)

            let house_logo = document.createElement('img')
            house_logo.className = 'house-logo'
            house_logo.src = `assets/img/png/${list_houses[0]}.png`
            house_logo.alt = 'casa-de-aposta'
            content_table.appendChild(house_logo);

            let play_button = document.createElement('button')
            play_button.className = 'play-button'
            content_table.appendChild(play_button)
            
            let img_play = document.createElement('img')
            img_play.src = 'assets/img/png/play-button.png'
            img_play.alt = 'jogar'
            play_button.appendChild(img_play)

            let content_filters_1 = document.createElement('div')
            content_filters_1.className = 'content-filters'
            content_table.appendChild(content_filters_1)
            

            let filters_houses = document.createElement('select')
            content_filters_1.appendChild(filters_houses)
            filters_houses.className = `filters-houses-${size}`
            
            list_houses.forEach(value =>{
                let option = document.createElement('option')
                filters_houses.appendChild(option)
                option.value = value
                option.innerText = value.toUpperCase()     
            })
        
            
            let date_filter = document.createElement('input')
            content_filters_1.appendChild(date_filter)
            date_filter.className = `input-filters-${size}`
            date_filter.id = 'date'
            date_filter.type = 'date'
            date_filter.value = new Date().toISOString().split('T')[0]
            
            let content_filters_2 = document.createElement('div')
            content_filters_2.className = 'content-filters'
            content_table.appendChild(content_filters_2)
            
            let candle_filter = document.createElement('input') 
            content_filters_2.appendChild(candle_filter)
            candle_filter.className  = `input-filters-${size}`
            candle_filter.id = 'candle'
            candle_filter.type = 'text'
            candle_filter.value  = '1.00';
            
            let time_filter = document.createElement('input')
            content_filters_2.appendChild(time_filter)
            time_filter.className  = `input-filters-${size}`
            time_filter.id = 'time'
            time_filter.type = 'time'
            time_filter.value = '00:00:00'
            
            let table = document.createElement('table')
            table.className = `table-dimension-${size}`
            content_table.appendChild(table)
            
            let thead = document.createElement('thead')
            table.appendChild(thead)
            
            let tr = document.createElement('tr')
            thead.appendChild(tr)
            
            let th_candle = document.createElement('th') 
            tr.appendChild(th_candle)
            th_candle.innerText = 'CANDLE' 
            
            let th_time = document.createElement('th') 
            tr.appendChild(th_time) 
            th_time.innerText = 'HOURS'
            
            let tbody = document.createElement('tbody')
            table.appendChild(tbody);
            tbody.className = 'candle-tbody'
            
            let ul = document.createElement('ul')
            content_table.appendChild(ul)
            ul.className = 'tablePagination';

            (function paginacao(){
                let buttons = []
                for (let i = 0; i < 9; i++){
                    buttons.push(document.createElement('button'))
                }  
                buttons[2].style.color = 'black'
                let id_page = 1
                buttons.forEach((button, index) =>{
                    if(index > 1 && index < 7){
                        button.className =`table-button-${size}`
                        button.setAttribute('id-page', id_page)
                        button.innerText = id_page

                        id_page++
                    }
                    else if(index == 0){
                        button.className =`table-button-${size}`
                        button.setAttribute('first-page', 'first-page')
                        button.innerText = '<<'

                    }
                    else if(index == 1){
                        button.className =`table-button-${size}`
                        button.setAttribute('previous-page', 'previous-page')
                        button.innerText = '<'

                    }
                    else if(index == 7){
                        button.className =`table-button-${size}`              
                        button.setAttribute('next-page', 'next-page')
                        button.innerText = '>'

                    }
                    else if(index == 8){
                        button.className =`table-button-${size}`
                        button.setAttribute('last-page', 'last-page')
                        button.innerText = '>>'

                    }
                    ul.appendChild(button)
                    button.style.marginRight = '0.4px';
                })                
            })();
        }
        function graphicStructure(){            
            let content_graphic = document.createElement('section')
            content_graphic.style.marginRight = '8px'
            content_graphic.className = 'content-graphic'
            content_house.appendChild(content_graphic)

            let piechart_1 = document.createElement('div')
            piechart_1.className = 'piechart'

            content_graphic.append(piechart_1)
            let piechart_2 = document.createElement('div')
            piechart_2.className = 'piechart'
            content_graphic.append(piechart_2)
            
            if(window.innerWidth <= 730){
                options = {
                title: 'TITULO AQUI',
                titleTextStyle: {
                    fontSize: 20, // Ajuste o tamanho do título conforme necessário
                    bold: true,   // Deixa o título em negrito
                    color: 'white', // Cor do título
                    italic: false, // Não deixa o título em itálico
                  },
                width: 340,  // Especifica a largura em pixels
                height: 340, // Especifica a altura em pixels
                colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
                pieHole: 0.4,
                pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 15},
                legend:{ position: 'top', textStyle: { fontSize: 10 } },
                // legend: 'none',
                pieSliceText: 'value',
                pieSliceBorderColor: 'black',
                backgroundColor: {
                    fill: 'none',
                    stroke: 'black ', // Cor da borda
                    strokeWidth: 0.1,   // Largura da borda
                },
                position: 'bottom'            
                }
            }else{
                options = {
                    title: 'Filtro Geral',
                    titleTextStyle: {
                        fontSize: 13, // Ajuste o tamanho do título conforme necessário
                        bold: true,   // Deixa o título em negrito
                        color: 'white', // Cor do título
                        italic: false, // Não deixa o título em itálico
                      },
                    width: 200,  // Especifica a largura em pixels
                    height: 200, // Especifica a altura em pixels
                    colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
                    pieHole: 0.4,
                    pieSliceTextStyle: {
                        color: 'white',
                      },
                    pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 10},
                    legend:{ position: 'top', textStyle: { fontSize: 8 } },
                    legend: 'none',
                    pieSliceText: 'value',
                    pieSliceBorderColor: 'black',
                    backgroundColor: {
                        fill: 'none',
                        stroke: 'black ', // Cor da borda
                        strokeWidth: 0.1,   // Largura da borda
                    },
                    position: 'bottom'            
                    }
            }     



        }
        function candleRareStructure(){

            let content_candles_rare = document.createElement('section')
            content_candles_rare.className = 'content-candles-rare'
            content_house.appendChild(content_candles_rare)
            
            let list_conteiner_candle_inline = []
            for(i = 0; i < 3; i++){
                list_conteiner_candle_inline.push(document.createElement('div'))
            }
            let list_candles_rare = []

            for (i = 0; i < 6; i++){
                list_candles_rare.push(document.createElement('div'));
            }
            values_candle_range = ['10x', '50x', '100x', '200x', '400x', '800x']
            let j = 0
            list_conteiner_candle_inline.forEach(value =>{
                value.className = 'container_candle_inline'
                content_candles_rare.appendChild(value)
                for(i = 0; i < 2; i++){
                    list_candles_rare[j].className = `candles-rare-${size}`
                    list_candles_rare[j].style.marginRight = '5px'
                    value.appendChild(list_candles_rare[j])
                    

                    let candle_range = document.createElement('span')
                    candle_range.className = `candle-range-${size}`
                    candle_range.innerText = values_candle_range[j]
                    list_candles_rare[j].appendChild(candle_range);

                    let candles_ago = document.createElement('p')
                    candles_ago.className = 'how-many-candles-ago'
                    candles_ago.innerText = 'Há 0 velas atrás'
                    list_candles_rare[j].appendChild(candles_ago)

                    let last_candle = document.createElement('span')
                    last_candle.className = 'last-candle'
                    last_candle.innerText = '00x'
                    list_candles_rare[j].appendChild(last_candle)
                    
                    let last_time = document.createElement('p')
                    last_time.className = 'last-time'
                    last_time.innerText = '00:00:00'
                    list_candles_rare[j].appendChild(last_time)
                    j++
                }
            })
        }

       return {tableStructure, graphicStructure, candleRareStructure}
    }        
    
    function initializeData(content_house){
        let reload_button = content_house.querySelector('button')
        reload_button.addEventListener('click', function(){
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })
        
        
        let betting_house = content_house.querySelector(`.filters-houses-${size}`)
        betting_house.addEventListener('input', function(){
            let house_logo = content_house.querySelector('.house-logo')
            house_logo.src = `assets/img/png/${betting_house.value}.png`            
            let [year, month, day] = date.value.split('-')
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })

        let date = content_house.querySelector("#date")
        date.addEventListener('input', function(){
            [year, month, day] = date.value.split('-')
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })
        
        let candle = content_house.querySelector('#candle')
        candle.addEventListener('input', function(){
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })

        let hour = content_house.querySelector("#time")
        hour.addEventListener('input', function(){
            this.value = this.value.substring(0,2)+":00"
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })
        

        let [year, month, day] = date.value.split('-')
        let table = `${day}/${month}/${year}/${betting_house.value}`;
        let page = 1;
        let page_quantity = 0;  
        

        function tableFilter(){      
            fetch("aviator/table",{
                method:"POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({table: table, page: page, fields: {candle: candle.value, hour: hour.value, date: date.value}}),
            })
            .then(response => response.json())
            .then(data => {
                let tbody = content_house.querySelector('tbody')
                let remove_table = content_house.querySelectorAll('.candle-tbody > tr');
                remove_table.forEach($value => $value.remove());
                page_quantity = Math.ceil(data.quantity_of_candles/12); //  Total velas/linhas por pagina = quantidade de paginas 
                data.table.forEach($value => {
                    let tr = document.createElement('tr');
                    let td =  document.createElement('td');
                    let span = document.createElement('span')
                    if($value.candle < 2){
                        span.className ="candle-blue"
                    }else if($value.candle < 10 ){
                        span.className ="candle-purple"
                    }else{
                        span.className ="candle-pink"
                    }
                    span.textContent = $value.candle ; 
                    tbody.appendChild(tr);  
                    tr.appendChild(td);
                    td.appendChild(span)
                    
                    td =  document.createElement('td');
                    td.textContent = $value.hour ;
                    tr.appendChild(td);
                }); 
            })
            .catch(error => {
                throw new Error('Erro aviator-statistics - table => ' + error);
                // console.log('Erro aviator-statistics - table => ', error)
            }); 
        }

        function graphicFilterAll(){
            fetch('aviator/graphic-all', {
                method:"POST",
                headers: {
                    'Content-Type': 'application/json'
                },                            
                body: JSON.stringify({table: table, date: date.value})
            })
            .then(response => response.json())
            .then(data => {
                data = google.visualization.arrayToDataTable([
                    ['Candles', 'Frequencia'],
                    ['Azul', Number(data.blue)],
                    ['Roxo',Number(data.purple)],
                    ['Rosa', Number(data.pink)]
                  ]);

                
                let chart = new google.visualization.PieChart(content_house.getElementsByClassName('piechart')[0]);
                options.title = 'Filtro Geral'
                chart.draw(data, options);
            })
            .catch(error => {
                throw new Error('Erro aviator-statistics - graphicAll => ' + error);
                // console.log('Erro aviator-statistics - graphicAll =>', error);
            })
        }

        function graphicFilterBy(){
            fetch('aviator/graphic-by', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({table:table, date:date.value, candle:candle.value, hour:hour.value})
            })
            .then(response => response.json())
            .then(data => {
                data = google.visualization.arrayToDataTable([
                    ['Candles', 'Frequencia'],
                    ['Azul', Number(data.blue)],
                    ['Roxo',Number(data.purple)],
                    ['Rosa', Number(data.pink)]
                  ]);

               
                let chart = new google.visualization.PieChart(content_house.getElementsByClassName('piechart')[1]);
                options.title = 'Filtro Tabela'
                chart.draw(data, options);
            })
            .catch(error => {
                throw new Error('Erro aviator-statistics - graphicBy => ' + error);
                // console.log('Erro aviator-statistics - graphicBy =>', error);

            })
        }

        function candleRareFilter(){
            fetch('aviator/candle-rare', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({table: table, date: date.value})

            })
            .then(response => response.json())
            .then(data => {
                let candle_rare = content_house.querySelectorAll(`.candles-rare-${size}`)
               
                let i = 0
                data.forEach(value => {
                   candle_rare[i].querySelector('.how-many-candles-ago').innerText = `Há ${value.quantity} velas atrás`
                   candle_rare[i].querySelector('.last-time').innerText = value.hour
                   candle_rare[i].querySelector('.last-candle').innerText = value.candle+'x'
                   i++
                })
            })
            .catch(error => {
                throw new Error('Erro aviator-statistics - candleRare => ' + error)
                // console.log('Erro aviator-statistics - candleRare =>', error);

            })
        }

        let button_list = content_house.querySelectorAll(".tablePagination > button");
        (function paginacao(){
            button_list.forEach((button) =>{ 
            button.addEventListener("click", function(){
                    let quick_navigation = button.attributes[1].value
                    let chosen_page = null
                    let i = 0
                    switch(quick_navigation){
                        case 'first-page':
                            chosen_page = 1
                            break
                        case 'previous-page':
                            chosen_page = page
                            button_list.forEach(button =>{
                                if((button.innerText == page-1)){
                                    chosen_page = Number(button.innerText)
                                }
                            })    
                            break
                        case 'next-page':
                            chosen_page = page
                            button_list.forEach(button =>{
                                if((button.innerText == page+1)){
                                    chosen_page = Number(button.innerText)
                                }
                        })   
                            break
                        case 'last-page':
                            chosen_page = page_quantity
                            break
                        default:
                            chosen_page = Number(button.innerText)
                            
                    }
                    if(chosen_page != page){
                        if(chosen_page>= 5 && button.innerText != page && chosen_page <= page_quantity - 4){
                            i = 0
                            button_list.forEach((button) =>  {
                                button.style.color = 'white'
                                if(!isNaN(Number(button.innerText)) ) {
                                    button.innerText = chosen_page - 2 + i
                                    i++;
                                }    
                            })
                            center_position = content_house.querySelector('[id-page="3"]')
                            center_position.style.color = 'black'
                        }else if(chosen_page != page && chosen_page < 5){
                            i = 1
                            button_list.forEach((button) =>{
                                button.style.color = 'white'
                                if(!isNaN(Number(button.innerText))){   
                                    button.innerText = i
                                    i++  
                                }
                            })
                            
                            button_list.forEach(button => { 
                                if(button.innerText == chosen_page){
                                    button.style.color = 'black';
                                }
                            })
                            
                        }else if(chosen_page > page_quantity - 4){
                            i = page_quantity - 4;
                            button_list.forEach((button) =>{
                                button.style.color = 'white'
                                if(!isNaN(Number(button.innerText))){   
                                    button.innerText = i
                                    i++
                                }
                            })
                            
                            button_list.forEach(button => { 
                                if(button.innerText == chosen_page){
                                button.style.color = 'black'; 
                                }
                            
                            })
                        }
                        page =  chosen_page
                    }
                
                tableFilter()
                graphicFilterAll()
                graphicFilterBy()
                candleRareFilter()

            });    
            });
        })()


        return {tableFilter, graphicFilterAll, graphicFilterBy, candleRareFilter}
    }

    return {createStructure, initializeData}
}




