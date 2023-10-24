
var input = document.querySelector(".dropdown");
console.log('AQUII', input)


input.addEventListener("click", toggleDropdown)

function toggleDropdown() {
    var dropdownContent = document.querySelector('.dropdown-content');
    dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    console.log("clickou")
}
