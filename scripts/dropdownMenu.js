function showDropdown() {
    document.getElementById("mobileDropdown").classList.toggle("m-show");
}

window.onclick = function (event) {
    if (!event.target.matches('.m-dropbtn')) {
        var dropdowns = document.getElementsByClassName("m-dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('m-show')) {
                openDropdown.classList.remove('m-show');
            }
        }
    }
}