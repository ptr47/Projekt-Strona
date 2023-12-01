function checkValue() {
    var select = document.getElementById("classification-select").value;
    var classification = document.getElementsByClassName("classification")[0];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementsByClassName("classification")[0].innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();
}