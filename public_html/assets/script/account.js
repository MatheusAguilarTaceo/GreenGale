function editData(){
    let list_button = document.querySelectorAll('.editar')
    let list_data = document.querySelectorAll('.nome')
    list_button.forEach((button, index) =>{
        button.addEventListener('click', function(){
            if(document.getElementById('input-'+index))
                return
                
            let value_user = list_data.item(index)
            value_user.style.display = 'none'
            console.log('ID  = ', value_user.id)
            let input = document.createElement('input');
            input.classList.add('nome') 
            input.type = 'text'
            input.placeholder = 'Digite seu nome'
            //max de caracteres 30
            input.id  = 'input-'+index
            console.log(input.id)
            value_user.insertAdjacentElement('afterend', input)
            input.addEventListener('keydown', (event) =>{
                if (event.key === 'Enter'){
                    console.log("ENTER")
                    if(input.value.length > 35){
                        let msg = 'Erro! Limte máximo caracteres atingidos!'
                        let time = 5000
                        showMessage(msg, time)
                        value_user.style.display = 'block'
                        input.remove()  
                        return
                    }
                    fetch('account', {
                        method: 'POST',
                        headers:{'Content-Type': 'application/json'},
                        body: JSON.stringify({'field': value_user.id, 'value':input.value})
                    })
                    .then(response => response.json())
                    .then(data =>{
                        if(data.status){
                            value_user.innerText = input.value
                            value_user.style.display = 'block'
                            input.remove()
                            showMessage(data.msg, data.time)
                            return
                        }
                        value_user.style.display = 'block'
                        input.remove()
                        showMessage(data.msg, data.time)
                        return
                    })
                    .catch(error =>{
                        console.log('erro  ', error)
                    })
                }
            })
        })
    })
    // fetch('account',{
    //     method: 'POST',
    //     headers: {'Content-Type': 'application'},
    //     body: {''}
    // })
   

}
editData()