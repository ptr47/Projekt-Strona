$(function () {
    var modal = document.getElementById("login-modal");
    
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});

function showModal() {
    document.getElementById("login-modal").style.display = "block";
}
