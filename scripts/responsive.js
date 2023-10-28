const hamburger = document.querySelector(".hamburgerMenu")
const width = window.innerWidth
console.log(width)
function responsive()
{
    if(width<900)
    {
        hamburger.classList.remove("invisible")
    }
}
window.addEventListener("load",responsive())