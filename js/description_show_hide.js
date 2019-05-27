/*const headers_block_li_1 = document.getElementById("click_li_link1");
const headers_block_li_2 = document.querySelector("#click_li_link2");
const headers_block_li_3 = document.querySelector("#click_li_link3");

const delivery_text = document.querySelector("#delivery_text");
const feature_text = document.querySelector("#feature_text");
const description_text = document.querySelector("#description_text");

const arr_li = [headers_block_li_1, headers_block_li_2, headers_block_li_3];

for(let i = 0; i <arr_li.length; i++)
{
    arr_li[i].addEventListener("click", click_li_func);
}

function click_li_func(e)
{
    if(e.target.id == arr_li[0])
    {
        console.log(e.target.id);
        delivery_text.style.display = "block";
        feature_text.style.display = "none";
        description_text.style.display = "none";
    }
    else if(e.target.id == arr_li[1])
    {
        console.log(e.target.id);
        feature_text.style.display = "block";
        delivery_text.style.display = "none";
        description_text.style.display = "none";
    }
    else
    {
        console.log(e.target.id);
        description_text.style.display = "block";
        delivery_text.style.display = "none";
        feature_text.style.display = "none";
    }
}*/
/*
function showStuff(id) 
{
    if(document.getElementById(id).style.display == 'block')
    {
        document.getElementById(id).style.display = 'none';
    }
    else
    {
        document.getElementById(id).style.display = 'block';
    }
}*/

const headers_block_li_1 = document.getElementById("click_li_link1");
const headers_block_li_2 = document.getElementById("click_li_link2");
const headers_block_li_3 = document.getElementById("click_li_link3");

const delivery_text = document.getElementById("delivery_text");
const feature_text = document.getElementById("feature_text");
const description_text = document.getElementById("description_text");

headers_block_li_1.onclick = function()
{
    if(delivery_text.style.display == 'block')
    {
        feature_text.style.display = 'none';
        description_text.style.display = 'none';
    }
    else
    {
        delivery_text.style.display = 'block';
        feature_text.style.display = 'none';
        description_text.style.display = 'none';
    }

    headers_block_li_1.className = "active";
    headers_block_li_2.classList.remove("active");
    headers_block_li_3.classList.remove("active");
};

headers_block_li_2.onclick = function()
{
    if(feature_text.style.display == 'block')
    {
        delivery_text.style.display = 'none';
        description_text.style.display = 'none';
    }
    else
    {
        delivery_text.style.display = 'none';
        feature_text.style.display = 'block';
        description_text.style.display = 'none';
    }

    headers_block_li_2.className = "active";
    headers_block_li_1.classList.remove("active");
    headers_block_li_3.classList.remove("active");
};

headers_block_li_3.onclick = function()
{
    if(description_text.style.display == 'block')
    {
        delivery_text.style.display = 'none';
        feature_text.style.display = 'none';
    }
    else
    {
        delivery_text.style.display = 'none';
        feature_text.style.display = 'none';
        description_text.style.display = 'block';
    }

    headers_block_li_3.className = "active";
    headers_block_li_1.classList.remove("active");
    headers_block_li_2.classList.remove("active");
};