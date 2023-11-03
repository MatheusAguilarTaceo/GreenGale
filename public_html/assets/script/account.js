function editData(){
    let list_button = document.querySelectorAll('.editar')
    console.log(list_button)
    let list_data = document.querySelectorAll('.nome')
    list_button.forEach((button, index) =>{
        button.addEventListener('click', function(){
            let user = list_data.item(index)
            let input = document.createElement('input');
            input.classList.add('box-plan', 'nome') 
            input.value = 'AQUIII'
            input.type = 'text'
            user.insertAdjacentElement('afterend', input)
            user.innerText = ' Milena'
        })
    })
    // fetch('account',{
    //     method: 'POST',
    //     headers: {'Content-Type': 'application'},
    //     body: {''}
    // })
   

}
editData()