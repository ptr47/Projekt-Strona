$(function () {
    checkValue();
});

function checkValue() {
    var wybor = document.getElementById("classification-select");
    var option = 0;
    switch (wybor.value) {
        case "Rodzaj broni":
            option = 0;
            break;
        case "Automatyka broni":
            option = 1;
            break;
        case "Tryb ognia broni":
            option = 2;
            break;
        case "Rodzaj amunicji":
            option = 3;
            break;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "resource/classification_content.xml", true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loadData(this, option, wybor);
        }
    };
}

function loadData(xml, option, title) {
    var i;
    var xmlDoc = xml.responseXML;
    var content = "<h2>" + title.value + ":</h2> <ul>";
    var item = xmlDoc.getElementsByTagName("TYPE")[option].getElementsByTagName("ITEM")
    for (i = 0; i < item.length; i++) {
        content += "<li><h4>" + item[i].getElementsByTagName("NAME")[0].textContent + "</h4>" + item[i].getElementsByTagName("DESC")[0].textContent + "</li>";
    }
    content += "</ul>";
    document.getElementsByClassName("classification")[0].innerHTML = content;
}
