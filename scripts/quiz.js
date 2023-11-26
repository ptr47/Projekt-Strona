$(function () {

})

function startQuiz() {
    $("#quiz-start").toggle();
    $(".quiz-container").toggle();
    $("body").one("mouseleave", function () {
        alert("Bez oszukiwania :)")
    })
}

function endQuiz() {
    $("body").off()
}