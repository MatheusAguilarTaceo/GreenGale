// const caminhoAtual = window.location.pathname;
// console.log("Caminho atual:", caminhoAtual);

// MOSTRA DATA ATUAL
function initializeData(table){
    console.log('INICIO = ', this)

    let data = new Date()
    let dia = data.getDate()
    let mes = data.getMonth()+1
    let ano = data.getFullYear()
    if(mes < 10){
        mes = '0'+mes
    }
    
    let time = table.querySelector(".main-btn-time")
    time.addEventListener('input', function(){
        this.value = this.value.substring(0,2)+":00"
        hour = this.value
        console.log("TIME = ", this.value)
        tableFilter()
    })
    let candle = table.querySelector('.main-btn-vela')
    candle.addEventListener('input', function(){
        numer = this.value;
        tableFilter()
    })
    table.querySelector(".main-combobox-date").value = `${ano}-${mes}-${dia}` 
    table.querySelector('.main-btn-vela').value = '1.00'
    table.querySelector(".main-btn-time").value = '00:00:00'
    table.querySelector('[id-page="1"]').style.color = 'black'
    
    const button_list = table.querySelectorAll(".tablePagination > button"); 
    let numer = 1;
    let hour = time.value;
    let page = 1;
    let page_quantity = 0;  

    // function paginacao(){
        button_list.forEach((button) =>{ 
        button.addEventListener("click", function(){
                let quick_navigation = button.attributes[0].value
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
                if(chosen_page>= 5 && button.innerText != page && chosen_page <= page_quantity - 4){
                    i = 0
                    button_list.forEach((button) =>  {
                        button.style.color = 'white'
                        if(!isNaN(Number(button.innerText)) ) {
                            button.innerText = chosen_page - 2 + i
                            i++;
                        }    
                    })
                    center_position = table.querySelector('[id-page="3"]')
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
            console.log("============")
            console.log('PAGE QUANTITY = ', page_quantity)
            console.log('PAGE  = ', page)
            console.log('hours = ', hour)
            console.log('NUMER = ', numer)
            tableFilter()
        });    
        });
    // }

    function tableFilter(){
        console.log("Table = ", table)
        let tbody = table.querySelector('tbody')
        console.log("AQUI = ", )
        fetch("/site_php/public_html/index.php/aviator/pagbet",{
            method:"POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({page: page, fields: {candle: numer, hours: hour}}),
        })
        .then(response => response.json())
        .then(data => {
            console.log("Verificando = ", table)
            console.log('TBODY = ', tbody)
            let remove_table = table.querySelectorAll('.aviatorTb > tr');
            remove_table.forEach($value => $value.remove());
            page_quantity = Math.floor(data.page_quantity/15) +1;
            data.table.forEach($value => {
                let td =  document.createElement('td');
                let tr = document.createElement('tr');
                td.textContent = $value.candle ; 
                // table.table.tbody.appendChild(tr)
                tbody.appendChild(tr);  
                // table.table.tbody.tr.appendChild(td)
                tr.appendChild(td);
                
                td =  document.createElement('td');
                td.textContent = $value.hours ; 
                // table.tbody.appendChild(tr)
                tbody.appendChild(tr);  
                // table.tr.appendChild(td)
                tr.appendChild(td);
            }); 
        })
        .catch(error => {
            console.error("Erro ao fazer a requisição:", error);
        }); 
    }
   
    return {tableFilter}
}


tables  = document.querySelectorAll('[id ^="table"]')

tables.forEach((table) =>{
    let data = initializeData(table)
    data.tableFilter()
})
// let data = initializeData()
// data.tableFilter();
// data.paginacao();
// let data2 = initializeData()
// data2.tableFilter()




function A(){
   let array = [1,2,3]
   array.forEach(B)
}

function B(){
    console.log(array)
}





