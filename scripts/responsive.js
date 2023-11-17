function responsive()
{
    const width = window.innerWidth
    console.log(width)
    if(width<768)
    {
        $("#hamburgerMenu").show();
    }
    else
    {
        $("#hamburgerMenu").hide();
    }
}