const catalog = document.querySelector(".catalog_hover");
const choose_catalog = document.querySelector(".choose_catalog");

catalog.addEventListener("click", function(e)
{
    if(choose_catalog.style.display === "block")
    {
        choose_catalog.style.display = "none";
    }
    else
    {
        choose_catalog.style.display = "block";
    }
});
/*
catalog.addEventListener("mouseenter", function()
{
    choose_catalog.style.display = "block";
});

catalog.addEventListener("mouseleave", function()
{
    choose_catalog.style.display = "none";
});*/