function responsive()
{
    const width = window.innerWidth
    console.log(width)
    if(width<768)
    {
        document.getElementById("hamburgerMenu").classList.add("m-show")
    }
    else
    {
        document.getElementById("hamburgerMenu").classList.remove("m-show")
    }
}