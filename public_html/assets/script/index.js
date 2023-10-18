// const caminhoAtual = window.location.pathname;
// console.log("Caminho atual:", caminhoAtual);

// MOSTRA DATA ATUAL

function indexTable(start_table){
    let numberOfTables = 0
    // let table_block = false

    function initializeData(){
        numberOfTables++
        let table_content = document.querySelector(`[id="table-content-${numberOfTables}"]`)
        console.log('INICIO = ', this)
    
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
        

        let betting_house = table_content.querySelector(".box_filtro")
        console.log("CASA DE APOSTA = ", betting_house.value)
        betting_house.addEventListener('input', function(){
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
        })

        let date = table_content.querySelector("#date")
        date.value = `${year}-${month}-${day}`
        date.addEventListener('input', function(){
            [year, month, day] = date.value.split('-')
            table = `${day}/${month}/${year}/${betting_house.value}`;
            tableFilter()
        })
        
        let candle = table_content.querySelector('#candle')
        candle.value = '1.00'
        candle.addEventListener('input', function(){
            tableFilter()
        })

        let hour = table_content.querySelector("#time")
        hour.value  ='00:00:00'
        hour.addEventListener('input', function(){
            this.value = this.value.substring(0,2)+":00"
            tableFilter()
        })
        
        table_content.querySelector('[id-page="1"]').style.color = 'black'
        
        const button_list = table_content.querySelectorAll(".tablePagination > button"); 
        
        let table = `${day}/${month}/${year}/${betting_house.value}`;
        let page = 1;
        let page_quantity = 0;  
        console.log('TABLE BD = ', table)
        console.log('PAGE = ', page)
        console.log("DATE = ", date.value)
        console.log("CANDLE = ", candle.value)
        console.log("HOURS = ", hour.value)

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
                        center_position = table_content.querySelector('[id-page="3"]')
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
            
            console.log("============")
            console.log('PAGE QUANTITY = ', page_quantity)
            console.log('PAGE  = ', page)
            console.log('hours = ', hour)
            console.log('NUMER = ', candle)
            tableFilter()
        });    
        });
        // }
        function tableFilter(){
            console.log('DATA ESCOLHIDA =', date.value)
            console.log("Table = ", table_content)
            console.log("Nome Da Tabela no BD = ", table)
            fetch("aviator",{
                method:"POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({table: table, page: page, fields: {candle: candle.value, hour: hour.value, date: date.value}}),
            })
           
            .then(response => response.json())
            .then(data => {
                console.log("Verificando = ", data)
                let tbody = table_content.querySelector('tbody')
                let remove_table = table_content.querySelectorAll('.aviatorTb > tr');
                remove_table.forEach($value => $value.remove());
                page_quantity = Math.ceil(data.page_quantity/15);
                console.log('PAGE QUANTITY ATUAL = ', page_quantity)
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
       
        return {tableFilter}
    }

    function createTableStructure(){
        let section = document.createElement('section')
        if(numberOfTables % 2 == 0){
            let main  = document.querySelector("main")
            let div_table_block = document.createElement('div')
            main.appendChild(div_table_block)
            div_table_block.className = 'table-block'
            div_table_block.appendChild(section)
        }else{
            let last_table_content = document.querySelector(`#table-content-${numberOfTables}`)
            last_table_content.insertAdjacentElement('afterend', section);
        }
        console.log('NUMERO DA TABELA = ',numberOfTables)
        section.className = 'table-content'
        section.id = `table-content-${numberOfTables+1}` 

        let div_1 = document.createElement('div')
        section.appendChild(div_1)
        
        let select = document.createElement('select')
        div_1.appendChild(select)
        select.className = 'box_filtro'
    
        let option_1 = document.createElement('option')
        select.appendChild(option_1)
    
        option_1.value = 'pagbet.html'
        option_1.innerText = 'PAGBET'
        
        
        let option_2 = document.createElement('option')
        select.appendChild(option_2)
        option_2.value = '2xbet.html'
        option_2.innerText = '2XBET'
        
        let option_3 = document.createElement('option')
        select.appendChild(option_3)
        option_3.value = 'ssgames.html'
        option_3.innerText = 'SSGAMES'
        
        let option_4 = document.createElement('option')
        select.appendChild(option_4)
        option_4.value = 'betNacional.html'
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
        tbody.className = 'aviatorTb'
        
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

    return {initializeData, createTableStructure}
}

function createNewTable(){
    let  buttonNewTable = document.querySelector('.new-table')
    buttonNewTable.addEventListener('click', function(){ 
       start_table.createTableStructure()
       let table = start_table.initializeData()
       table.tableFilter()
    })
}


let start_table = indexTable()
let table = start_table.initializeData()
table.tableFilter() 

let table2 = start_table.initializeData()
table2.tableFilter()

createNewTable(start_table)











