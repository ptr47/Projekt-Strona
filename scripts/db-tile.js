$(function () {
   $(".modal").click(function () { 
    $("#db-tile").hide();
   });
});
function tileShow(event) {
    var tile = event.target.parentElement
    if (tile.id === "container-weapons") { tile = event.target}
    console.log(tile);
    var modal = document.getElementById("db-tile");
    modal.style.display = "block";
    var obraz = tile.firstElementChild.outerHTML
    var nazwa = tile.getElementsByClassName("tile-name")[0].innerHTML
    var typ = tile.getElementsByClassName("tile-type")[0].innerHTML
    document.getElementById("tile-content").innerHTML = obraz +'    <p>Nazwa: ' + nazwa + '</p>    <p>Typ: ' +typ + '</p>'

}