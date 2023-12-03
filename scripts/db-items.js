var option = "WPN"
$(function () {
    if (document.getElementById("radio-wpn").checked) {
        option = "WPN";
        changeAtoW();
    }
    else {
        option = "AMMO";
        changeWtoA();
    }
})

function checkValue() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "resource/database_content.xml", true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            loadData(this);
        }
    };
}

function loadData(xml) {
    var i;
    var id;
    var xmlDoc = xml.responseXML;
    var content;
    if (document.getElementById("radio-ammo").checked) {
        option = "AMMO";
    }
    
    var item = xmlDoc.getElementsByTagName(option)[0].getElementsByTagName("TILE")
    for (i = 0; i < item.length; i++) {
        console.log(item);
        content+=item[i].innerHTML;
        /*content += '<div class="tile">';
        content += '<img ' + item[i].getElementsByTagName("IMG")[0].childNodes[0].nodeValue + '>';
        content += '<p class="tile-name">' + item[i].getElementsByTagName("NAME")[0].childNodes[0].nodeValue + '</p>';
        content += '<p class="tile-type">' + item[i].getElementsByTagName("TYPE")[0].childNodes[0].nodeValue + '</p>';
        if (option == "WPN")
            id = 2 * i;
        else
            id = 2 * i + 1;
        content += '<p class="tile-id">' + id + '</p>';
        content += '</div';*/
    }
    document.getElementsByClassName("tile-container")[0].innerHTML = content;
}

function changeWtoA() {
    /*$('#container-weapons').hide();
    $('#container-ammo').show();*/
    checkValue();
    $('#db-type-wpn').hide();
    $('#db-type-ammo').show();
}

function changeAtoW() {
    /*$('#container-weapons').show();
    $('#container-ammo').hide();*/
    checkValue();
    $('#db-type-wpn').show();
    $('#db-type-ammo').hide();
}