function filter() {
    var filter = document.getElementById('db-input').value.toUpperCase();
    var type = 0; // 0 for weapons container, 1 for ammo container
    if (document.getElementById("radio-ammo").checked) { type = 1; }
    var tiles = document.getElementsByClassName('tile-container')[type].getElementsByClassName('tile');

    for (var i = 0; i < tiles.length; i++) {
        let p = tiles[i].getElementsByClassName("tile-name")[0];
        if (p.textContent.toUpperCase().indexOf(filter) > -1) {
            tiles[i].style.display = "";
        } else {
            tiles[i].style.display = "none";
        }
    }
}

function filterType() {
    var type = 0, typeName = "db-type-wpn";
    if (document.getElementById("radio-ammo").checked) {
        type = 1;
        typeName = "db-type-ammo";
    }
    var filter = document.getElementById(typeName).value;
    var tiles = document.getElementsByClassName('tile-container')[type].getElementsByClassName('tile');

    for (var i = 0; i < tiles.length; i++) {
        let p = tiles[i].getElementsByClassName("tile-type")[0];
        if (p.textContent == filter || filter == "") {
            tiles[i].style.display = "";
        } else {
            tiles[i].style.display = "none";
        }
    }
}

$(function () {
    if (document.getElementById("radio-wpn").checked) {
        changeAtoW();
    }
    else {
        changeWtoA();
    }
})

function changeWtoA() {
    $('#container-weapons').hide();
    $('#container-ammo').show();
    $('#db-type-wpn').hide();
    $('#db-type-ammo').show();
}

function changeAtoW() {
    $('#container-weapons').show();
    $('#container-ammo').hide();
    $('#db-type-wpn').show();
    $('#db-type-ammo').hide();
}