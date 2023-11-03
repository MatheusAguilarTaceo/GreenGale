(function authentication(){
    document.getElementById('form-login').onsubmit = function(event) {
        event.preventDefault()
        let form = new FormData(this)
        fetch('login', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({'email': form.get('email'), 'password': form.get('password')})
        }) 
        .then(response => response.json())
        .then(data => {
            if(data.status){
                window.location.replace(data.redirect)
                return
            }
            showMessage(data.msg, data.time)
        })
        .catch(error => {
            console.log('Erro login => ', error.status)
        })
    }
})()