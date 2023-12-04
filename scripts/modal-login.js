$(function () {
    var modal = document.getElementById("login-modal");
    
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});

function showModal() {
    $("#register-panel").hide();
    document.getElementById("login-modal").style.display = "block";
}

function changeLogin() {
    var btn = $("#change-logreg-button");
    var txt = document.getElementById("include-login").getElementsByTagName("span")[0];
    if (btn.html() == "Zaloguj się") {
        $("#register-panel").hide();
        $("#login-panel").show();
        btn.html("Zarejestruj się");
        txt.innerHTML = "Nie masz konta? ";
    }
    else {
        $("#login-panel").hide();
        $("#register-panel").show();
        btn.html("Zaloguj się");
        txt.innerHTML = "Masz już konto? ";
    }
}