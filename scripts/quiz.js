
function startQuiz() {
    $("#quiz-start").toggle();
    $(".quiz-container").toggle();
    setNames();
    $("body").one("mouseleave", function () {
        alert("Bez oszukiwania :)")
    })
}

function endQuiz() {
    $("body").off()
    $(".quiz-container").hide();
    $("#quiz-result").show();
}

document.addEventListener("dragstart", function (event) {
    event.dataTransfer.setData("Text", event.target.id);
    event.target.style.opacity = "0.5";
});
document.addEventListener("dragend", function (event) {
    event.target.style.opacity = "1";
});
document.addEventListener("dragover", function (event) {
    event.preventDefault();
});
document.addEventListener("drop", function (event) {
    event.preventDefault();
    let data = event.dataTransfer.getData("Text");
    if (event.target.className == "target") {
        if (event.target.children.length == 0) {
            event.target.appendChild(document.getElementById(data));
        }
    }
    else {
        document.getElementsByClassName("question-names")[0].appendChild(document.getElementById(data));
    }
});

function setNames() {
    const gunNames = ["Beretta M9", "M1918A2 BAR", "M16A2", "AK-74", "M1 Garand"]
    shuffleArray(gunNames);
    $("#q-n1").html(gunNames[0]);
    $("#q-n2").html(gunNames[1]);
    $("#q-n3").html(gunNames[2]);
    $("#q-n4").html(gunNames[3]);
    $("#q-n5").html(gunNames[4]);
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}