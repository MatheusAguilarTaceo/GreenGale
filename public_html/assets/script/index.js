
function indexData(){
    let number_of_houses = 0

    function createStructure(){
        
        function tableStructure(){
            let section = document.createElement('section')
            if(content_house % 2 == 0){
                let main  = document.querySelector("main")
                let div_table_block = document.createElement('div')
                main.appendChild(div_table_block)
                div_table_block.className = 'table-block'
                div_table_block.appendChild(section)
            }else{
                let last_content_house = document.querySelector(`#table-content-${content_house+1}`)
                last_content_house.insertAdjacentElement('afterend', section);
            }
            section.className = 'table-content'
            section.id = `table-content-${numberOfTables+1}` 
    
            let div_1 = document.createElement('div')
            section.appendChild(div_1)
            
            let select = document.createElement('select')
            div_1.appendChild(select)
            select.className = 'box_filtro'
        
            let option_1 = document.createElement('option')
            select.appendChild(option_1)
        
            option_1.value = 'pagbet'
            option_1.innerText = 'PAGBET'
            
            
            let option_2 = document.createElement('option')
            select.appendChild(option_2)
            option_2.value = '2xbet'
            option_2.innerText = '2XBET'
            
            let option_3 = document.createElement('option')
            select.appendChild(option_3)
            option_3.value = 'ssgames'
            option_3.innerText = 'SSGAMES'
            
            let option_4 = document.createElement('option')
            select.appendChild(option_4)
            option_4.value = 'betNacional'
            option_4.innerText = 'BETNACIONAL'
            
            let input_1 = document.createElement('input')
            div_1.appendChild(input_1)
            input_1.className = 'input_filters'
            input_1.id = 'date'
            input_1.type = 'date'
            
            let div_2 = document.createElement('div')
            section.appendChild(div_2)
            
            let input_2 = document.createElement('input') 
            div_2.appendChild(input_2)
            input_2.className  = 'input_filters'
            input_2.id = 'candle'
            input_2.type = 'text'
            
            let input_3 = document.createElement('input')
            div_2.appendChild(input_3)
            input_3.className  = 'input_filters'
            input_3.id = 'time'
            input_3.type = 'time'
            
            let table = document.createElement('table')
            section.appendChild(table)
            
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
            section.appendChild(ul)
            ul.className = 'tablePagination'
            
            let buttons = []
            for (let i = 0; i < 10; i++){
                buttons.push(document.createElement('button'))
            }  
            
            let id_page = 1
            buttons.forEach((button, index) =>{
                if(index > 1 && index < 7){
                    button.className ='tableButton'
                    button.setAttribute('id-page', id_page)
                    button.innerText = id_page
                    id_page++
                }
                else if(index == 0){
                    button.className ='tableButton'
                    button.setAttribute('first-page', 'first-page')
                    button.innerText = '<<'
                }
                else if(index == 1){
                    button.className ='tableButton'
                    button.setAttribute('previous-page', 'previous-page')
                    button.innerText = '<'
                }
                else if(index == 7){
                    button.className ='tableButton'
                    button.setAttribute('data-page', '...')
                    button.innerText = '...'
                }
                else if(index == 8){
                    button.className ='tableButton'
                    button.setAttribute('next-page', 'next-page')
                    button.innerText = '>'
                }
                else if(index == 9){
                    button.className ='tableButton'
                    button.setAttribute('last-page', 'last-page')
                    button.innerText = '>>'
                }
                ul.appendChild(button)
                button.style.marginRight = '0.4px';
            })
        }
        function graphicStructure(){
            
        }
    }
    
    function initializeData(){
        number_of_houses++
        let content_house = document.getElementById(`content-house-${number_of_houses}`)
        console.log(content_house)
    
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
        
        let betting_house = content_house.querySelector(".box-filters-small")
        console.log('BOX FILTRO = ', betting_house)
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
        console.log('Lista de Botões', button_list)
        betting_house.value ='pagbet'
        let table = `${day}/${'09'}/${year}/${betting_house.value}`;
        console.log('AAA = ',table)
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
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({table: table, page: page, fields: {candle: candle.value, hour: hour.value, date: date.value}}),
            })
            .then(response => response.json())
            .then(data => {
                let tbody = content_house.querySelector('tbody')
                let remove_table = content_house.querySelectorAll('.candle-tbody > tr');
                remove_table.forEach($value => $value.remove());
                page_quantity = Math.ceil(data.quantity_of_candles/12); //  Total velas/linhas por pagina = quantidade de paginas 
                console.log(data)
                console.log("Quantidade de Paginas = ", page_quantity)
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
                // console.error("Erro ao fazer a requisição:", error);
                throw new Error('Erro na requisição: ' + error.status);
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
                console.log(data)
                // console.log("TESTE DE TIPO = ", typeof(data.pink))
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
                    pieSliceTextStyle: {color: 'black', fontName: 'Arial', fontSize: 7},
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
                throw new Error('Erro na requisição: ' + error.status);
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
                console.log(data)
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
                console.log('AS VELAS RARAS = ',data)
                let candle_rare = content_house.querySelectorAll('.candles-rare')
                console.log(candle_rare)
                let i = 0
                data.forEach(value => {
                   candle_rare[i].querySelector('.how-many-candles-ago').innerText = `Há ${value.quantity} velas atrás`
                   candle_rare[i].querySelector('.last-candle-time').innerText = value.hour
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

// function createNewTable(start_table){
//     let  buttonNewTable = document.querySelector('.new-table')
//     buttonNewTable.addEventListener('click', function(){ 
//        start_table.createTableStructure()
//        let table = start_table.initializeData()
//        table.tableFilter()
//     })
// }

let aviator_statitistics = indexData()
try{
let table = aviator_statitistics.initializeData()
table.tableFilter()
table.graphicFilterAll()
table.graphicFilterBy()
table.candleRareFilter()
}catch{}
try{
let table2 = aviator_statitistics.initializeData()

table2.tableFilter()
table2.graphicFilterAll()
table2.graphicFilterBy()
table2.candleRareFilter()
}catch{}

let table3 = aviator_statitistics.initializeData()

table3.tableFilter()
table3.graphicFilterAll()
table3.graphicFilterBy()
table3.candleRareFilter()

let table4 = aviator_statitistics.initializeData()

table4.tableFilter()
table4.graphicFilterAll()
table4.graphicFilterBy()
table4.candleRareFilter()



  



