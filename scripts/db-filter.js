function filter() {
    var filter = document.getElementById('db-input').value.toUpperCase();
    var tiles = document.getElementsByClassName('tile-container')[0].getElementsByClassName('tile');

    for (var i = 0; i < tiles.length; i++) {
        let p = tiles[i].getElementsByTagName("p")[0];
        if (p.textContent.toUpperCase().indexOf(filter) > -1) {
            tiles[i].style.display = "";
        } else {
            tiles[i].style.display = "none";
        }
    }
}
