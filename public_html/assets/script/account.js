(function editData(){
    let placeholders  = ['Digite seu nome', 'Digite seu email', 'Digite sua senha']
    let list_button_editar = document.querySelectorAll('.editar')
    let list_data = document.querySelectorAll('.nome')
    list_button_editar.forEach((button, index) =>{
        button.addEventListener('click', function(){
            let btn_desfazer = document.querySelectorAll('.desfazer')[index]
            btn_desfazer.style.display = 'block'
            button.style.display = 'none'
            if(document.getElementById('input-'+index))
                return
                
            let value_user = list_data.item(index)
            value_user.style.display = 'none'
            let input = document.querySelectorAll('input')[index];
            input.value = ''
            input.style.display = 'block'
            input.placeholder = placeholders[index]
            //max de caracteres 35
            value_user.insertAdjacentElement('afterend', input)
            input.addEventListener('keydown', (event) =>{
                if (event.key === 'Enter'){
                    if(input.value.length > 35){
                        let msg = 'Erro! Limte máximo caracteres atingidos!'
                        let time = 5000
                        showMessage(msg, time)
                        input.style.display = 'none'
                        button.style.display = 'block'
                        btn_desfazer.style.display = 'none'
                        value_user.style.display = 'block'
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
                            btn_desfazer.style.display = 'none'
                            button.style.display = 'block'
                            input.style.display = 'none'
                            value_user.style.display = 'block'
                            showMessage(data.msg, data.time)
                            return
                        }
                        btn_desfazer.style.display = 'none'
                        button.style.display = 'block'
                        input.style.display = 'none'
                        value_user.style.display = 'block'
                        
                        showMessage(data.msg, data.time)
                        return
                    })
                    .catch(error =>{
                        throw new Error('erro na requição => ' + error)
                    })
                }
            })
        })
    })

    let list_button_desfazer = document.querySelectorAll('.desfazer')
    list_button_desfazer.forEach((value, index) =>{
        value.addEventListener('click', function() {
            let btn_editar = document.querySelectorAll('.editar')[index]
            console.log('btn ', btn_editar)
            btn_editar.style.display = 'block'
            value.style.display = 'none'
            let input = document.querySelectorAll('.input-nome')[index]
            console.log('input ', input)
            input.style.display = 'none'
            let txt =  document.querySelectorAll('.nome')[index]
            console.log('text = ', txt)
            txt.style.display = 'block'


        })
    })

})();