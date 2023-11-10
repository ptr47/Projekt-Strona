window.onclick = function (event) {
    if (!event.target.matches("#hamburgerMenu")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
function dropdown()
{
    document.getElementById("myDropdown").classList.toggle("invisible");
}