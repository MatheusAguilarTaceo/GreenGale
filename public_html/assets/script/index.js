(function logged(){
    let list_tags = ['.dropdown-content', '.dropdown-content-mobile']
    let input = document.querySelectorAll(".container-dropdown");
    console.log("RESULTADO DOS INPUTS =", input)
    if(input){
        input.forEach((value, index) =>{
            function toggleDropdown() {
                let dropdownContent = document.querySelectorAll(list_tags[index])[index];
                console.log(dropdownContent)
                dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
                console.log("Display atual = " ,dropdownContent.style.display)
                console.log("clickou")
            }
             value.addEventListener("click", toggleDropdown)

        })
    }
})();

(function responsive(){
    document.querySelector('.menu-button').addEventListener('click', value =>{
        let mobile_menu = document.querySelector('.mobile-menu')
        console.log(value.target)
        if(mobile_menu.classList.contains('open')){
                mobile_menu.classList.remove('open')
                value.target.src = 'assets/img/png/button-menu.png'
        }else{
            mobile_menu.classList.add('open')
            value.target.src = 'assets/img/png/button-menu-x.png'
        }
        console.log(mobile_menu)
        mobile_menu.style.display = (mobile_menu.style.display === 'block') ? 'none' : 'block'
    })
})()

function showMessage(msg, time){
    let error = document.createElement('div')
    error.classList.add('message','container-fluid')
    error.innerText = msg
    let body = document.querySelector("body")
    body.appendChild(error)
    setTimeout(()=>{
        error.remove()
    }, time)
}
