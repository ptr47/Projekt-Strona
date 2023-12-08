function toggleComments(event) {
    var comments = event.target.offsetParent.parentNode.getElementsByClassName("comment");
    for (let index = 0; index < comments.length; index++) {
        const element = comments[index];
        if (element.style.display === "none") { element.style.display = ""; }
        else { element.style.display = "none"; }
    }
}