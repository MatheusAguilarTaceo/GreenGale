(function logged(){
    let input = document.querySelector(".dropdown");
    if(input){
        function toggleDropdown() {
            let dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
            console.log("clickou")
        }
         input.addEventListener("click", toggleDropdown)
    }
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
