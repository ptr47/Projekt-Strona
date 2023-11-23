function filter() {
    var type = 0, typeName = "db-type-wpn"; // 0 for weapons container, 1 for ammo container
    
    if (document.getElementById("radio-ammo").checked) {
        type = 1;
        typeName = "db-type-ammo";
    }

    var filterText = document.getElementById('db-input').value.toUpperCase();
    var filterType = document.getElementById(typeName).value;

    var tiles = document.getElementsByClassName('tile-container')[type].getElementsByClassName('tile');

    for (var i = 0; i < tiles.length; i++) {
        let tileName = tiles[i].getElementsByClassName("tile-name")[0];
        let tileType = tiles[i].getElementsByClassName("tile-type")[0];

        if (tileName.textContent.toUpperCase().indexOf(filterText) > -1 && (tileType.textContent == filterType || filterType == "")) {
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