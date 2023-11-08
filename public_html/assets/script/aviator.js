(function googleGraphic(){
    let url = document.createElement('script')

    url.type = 'text/javascript'
    url.src = 'https://www.gstatic.com/charts/loader.js'
    url.onload = () =>{
        google.charts.load('current', {'packages':['corechart']});
        
    }
    document.body.appendChild(url);
})()


function indexData(){
    let number_of_houses = 1
    let size = 'medium'
    let limit = null
    let msg = null
    let time = null
    fetch('aviator/data-controller',{
        method: 'POST',
        headers: {"Content-Type": "application/json"}
    })
    .then(response => response.json()) 
    .then(data => {
        console.log('AQUI O AVISO = ', data)
        console.log("DATA_LIMIT_FECTH = ", data.limit)
        limit = data.limit
        msg = data.msg
        time = data.time
    })
    console.log("DATA_LIMT = ", limit);
    

    (function createHouse(){
        let btn_create = document.querySelector('#btn-create')
        btn_create.addEventListener('click', () =>{
            let new_house = createStructure()
            new_house.tableStructure()
            new_house.graphicStructure()
            new_house.candleRareStructure()

            new_house = initializeData()
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
        })
    })();

    function modifyClass(id){
        let content_house = document.getElementById(`content-house-${id}`)
        let list_elements_medium = content_house.querySelectorAll('[class *= "medium"]')
        list_elements_medium.forEach(value =>{
            value.className = value.className.replace('medium', 'small')
        })

    }
    function createStructure(){
        if(number_of_houses  == limit){
            showMessage(msg, time)
            return 
        } 

        number_of_houses++
        console.log('numero de casas = ', number_of_houses)
        size = 'small'
        let content_house =  document.createElement('div')
        content_house.className = 'content-house'
        content_house.id = `content-house-${number_of_houses}`
        if(number_of_houses % 2 == 0){
            modifyClass(number_of_houses-1)
            let previous_content_house = document.getElementById(`content-house-${number_of_houses-1}`)
            previous_content_house.insertAdjacentElement('afterend', content_house)
        }else{
            size = 'medium'
            console.log("Aqui DIVISÃO")
            let content_block = document.createElement('div')
            content_block.className = 'content-block'
            let aviator_statistics  = document.querySelector('.aviator-statistics')
            aviator_statistics.appendChild(content_block)
            content_block.appendChild(content_house)
        }

        function tableStructure(){
            let content_table = document.createElement('section')
            content_table.className = 'content-table'  
            content_house.appendChild(content_table)  

            let house_logo = document.createElement('img')
            house_logo.className = 'house-logo'
            house_logo.setAttribute('src', 'assets/img/png/2bxbet.png')
            house_logo.setAttribute('alt', 'Logo casa de aposta')
            content_table.appendChild(house_logo);
            
            let content_filters_1 = document.createElement('div')
            content_filters_1.className = 'content-filters'
            content_table.appendChild(content_filters_1)
            

            let filters_houses = document.createElement('select')
            content_filters_1.appendChild(filters_houses)
            filters_houses.className = `filters-houses-${size}`

            let list_houses = ['2bxbet', 'pagbet', 'betano']
            
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
            
            let content_filters_2 = document.createElement('div')
            content_filters_2.className = 'content-filters'
            content_table.appendChild(content_filters_2)
            
            let candle_filter = document.createElement('input') 
            content_filters_2.appendChild(candle_filter)
            candle_filter.className  = `input-filters-${size}`
            candle_filter.id = 'candle'
            candle_filter.type = 'text'
            
            let time_filter = document.createElement('input')
            content_filters_2.appendChild(time_filter)
            time_filter.className  = `input-filters-${size}`
            time_filter.id = 'time'
            time_filter.type = 'time'
            
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
            table.appendChild(tbody)
            tbody.className = 'candle-tbody'
            
            let ul = document.createElement('ul')
            content_table.appendChild(ul)
            ul.className = 'tablePagination'
            
            let buttons = []
            for (let i = 0; i < 10; i++){
                buttons.push(document.createElement('button'))
            }  
            
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
                    button.setAttribute('data-page', '...')
                    button.innerText = '...'

                }
                else if(index == 8){
                    button.className =`table-button-${size}`              
                    button.setAttribute('next-page', 'next-page')
                    button.innerText = '>'

                }
                else if(index == 9){
                    button.className =`table-button-${size}`
                    button.setAttribute('last-page', 'last-page')
                    button.innerText = '>>'

                }
                ul.appendChild(button)
                button.style.marginRight = '0.4px';
            })
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




        }
        function candleRareStructure(){
            let content_candles_rare = document.createElement('section')
            content_candles_rare.className = 'content-candles-rare'
            content_house.appendChild(content_candles_rare)

            let conteiner_candle_inline = document.createElement('div')
            conteiner_candle_inline.className = 'container-candle-inline'
            content_candles_rare.appendChild(conteiner_candle_inline)
            
            let candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'
            conteiner_candle_inline.appendChild(candles_rare)
            
            let candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            let candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            let last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            let last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)

            candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'

            conteiner_candle_inline.appendChild(candles_rare)

            candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)

            conteiner_candle_inline = document.createElement('div')
            conteiner_candle_inline.className = 'container-candle-inline'
            content_candles_rare.appendChild(conteiner_candle_inline)


            candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'
            conteiner_candle_inline.appendChild(candles_rare)

            candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)

            candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'
            conteiner_candle_inline.appendChild(candles_rare)

            candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)

            conteiner_candle_inline = document.createElement('div')
            conteiner_candle_inline.className = 'container-candle-inline'
            content_candles_rare.appendChild(conteiner_candle_inline)


            candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'
            conteiner_candle_inline.appendChild(candles_rare)

            candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)

            candles_rare = document.createElement('div')
            candles_rare.className = `candles-rare-${size}`
            candles_rare.style.marginRight = '5px'
            conteiner_candle_inline.appendChild(candles_rare)

            candle_range = document.createElement('span')
            candle_range.className = `candle-range-${size}`
            candle_range.innerText = '00x'
            candles_rare.appendChild(candle_range);

            candles_ago = document.createElement('p')
            candles_ago.className = 'how-many-candles-ago'
            candles_ago.innerText = 'Há 0 velas atrás'
            candles_rare.appendChild(candles_ago)

            last_candle = document.createElement('span')
            last_candle.className = 'last-candle'
            last_candle.innerText = '00x'
            candles_rare.appendChild(last_candle)
            
            last_time = document.createElement('p')
            last_time.className = 'last-time'
            last_time.innerText = '00:00:00'
            candles_rare.appendChild(last_time)
            
        }

       return {tableStructure, graphicStructure, candleRareStructure}
    }        
    
    function initializeData(){
        console.log("DATA_LIMT INI_DATA = ", limit)
        let content_house = document.getElementById(`content-house-${number_of_houses}`)    
        let date_current = new Date()
        let year = date_current.getFullYear()
        let month = date_current.getMonth()+1
        let day = date_current.getDate()
        if(month < 10){
            month = '0'+month  
        }
        if(day < 10){
            day = '0'+day  
        }

        let betting_house = content_house.querySelector(`.filters-houses-${size}`)
        betting_house.addEventListener('input', function(){
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })

        let date = content_house.querySelector("#date")
        date.value = `${year}-${month}-${day}`
        date.value = `2023-09-25`
        
        date.addEventListener('input', function(){
            [year, month, day] = date.value.split('-')
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })
        
        let candle = content_house.querySelector('#candle')
        candle.value = '1.00'
        candle.addEventListener('input', function(){
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })

        let hour = content_house.querySelector("#time")
        hour.value ='00:00:00'
        hour.addEventListener('input', function(){
            this.value = this.value.substring(0,2)+":00"
            tableFilter()
            graphicFilterAll()
            graphicFilterBy()
            candleRareFilter()
        })
        
        content_house.querySelector('[id-page="1"]').style.color = 'black'
        
        const button_list = content_house.querySelectorAll(".tablePagination > button"); 
        button_list[7].style.display = 'none'
        let table = `${day}/${'09'}/${year}/${betting_house.value}`;
        let page = 1;
        let page_quantity = 0;  

        // function paginacao(){
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
        // }


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
                console.log('Erro aviator-statistics => ', error.status )
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
                    ['Blue', Number(data.blue)],
                    ['Purple',Number(data.purple)],
                    ['Pink', Number(data.pink)]
                  ]);

                let options = {
                    width: 200,  // Especifica a largura em pixels
                    height: 200, // Especifica a altura em pixels
                    colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
                    pieHole: 0.4,
                    pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 10},
                    legend: 'none', 
                    pieSliceText: 'value',
                    pieSliceBorderColor: 'black',
                    backgroundColor: {
                        fill: 'none',
                        stroke: 'black ', // Cor da borda
                        strokeWidth: 0.1,   // Largura da borda
                    },
                    position: 'bottom'            
                };  
                let chart = new google.visualization.PieChart(content_house.getElementsByClassName('piechart')[0]);
                chart.draw(data, options);
            })
            .catch(error => {
                console.log('Erro na requisição: ' + error.status);
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
                    ['Blue', Number(data.blue)],
                    ['Purple',Number(data.purple)],
                    ['Pink', Number(data.pink)]
                  ]);

                let options = {
                    width: 200,  // Especifica a largura em pixels
                    height: 200, // Especifica a altura em pixels
                    colors: ['rgb(19, 101, 255)', 'rgb(174, 0, 255)', 'rgb(255, 32, 144)'],
                    pieHole: 0.4,
                    pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 10},
                    legend: 'none', 
                    pieSliceText: 'value',
                    pieSliceBorderColor: 'black',
                    backgroundColor: {
                        fill: 'none',
                        stroke: 'black ', // Cor da borda
                        strokeWidth: 0.1,   // Largura da borda
                    },
                    position: 'bottom'            
                };  
                let chart = new google.visualization.PieChart(content_house.getElementsByClassName('piechart')[1]);
                chart.draw(data, options);
            })
            .catch(error => {
                throw new Error('Erro na requisição: ' + error.status);
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
                throw new Error('Erro na requisição: ' + error.status)
            })
        }


        return {tableFilter, graphicFilterAll, graphicFilterBy, candleRareFilter}
    }

    return {createStructure, initializeData}
}



let aviator_statitistics = indexData()
let table = aviator_statitistics.initializeData()
table.tableFilter()
table.graphicFilterAll()
table.graphicFilterBy()
table.candleRareFilter()

