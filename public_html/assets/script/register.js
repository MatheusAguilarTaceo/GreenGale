(function createAccount(){
    document.getElementById('form-register').onsubmit = function(event) {
        event.preventDefault()
        let form = new FormData(this)
        fetch('register', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({'name': form.get('name'), 'email': form.get('email'), 'password': form.get('password')})
        }) 
        .then(response => response.json())
        .then(data => {
            if(data.status){
                console.log('AQUI O REGISTER', data)
                showMessage(data.msg, data.time)
                setTimeout(() => {
                    window.location.replace(data.redirect)
                }, data.time)
                return
            }
            showMessage(data.msg, data.time)
            console.log('AQUI O REGISTER', data)
        })
        .catch(error => {
            console.log('Erro cadastro => ', error.status)
        })
    }
})()