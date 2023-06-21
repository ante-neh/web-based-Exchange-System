const burger = document.querySelector("header i");
burger.addEventListener("click",function(){
    const ul = document.querySelector("ul");
    ul.classList.toggle("ul-active");
    burger.classList.toggle("bx-x");
    burger.classList.toggle("burger-rotate");
})
