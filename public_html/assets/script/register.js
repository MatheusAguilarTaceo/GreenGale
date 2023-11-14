(function createAccount(){
    document.getElementById('form-register').onsubmit = function(event) {
        event.preventDefault()
        let form = new FormData(this)
        if(form.get('password') != form.get('comfirm-password')){
            showMessage('senhas diferentes', 4000)
            return
        }
        fetch('register', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({'name': form.get('name'), 'email': form.get('email'), 'password': form.get('password')})
        }) 
        .then(response => response.json())
        .then(data => {
            if(data.status){
                showMessage(data.msg, data.time)
                setTimeout(() => {
                    window.location.replace(data.redirect)
                }, data.time)
                return
            }
            showMessage(data.msg, data.time)
        })
        .catch(error => {
            throw new Error('Erro cadastro' + error)
            // console.log('Erro cadastro => ', error.status)
        })
    }
})()