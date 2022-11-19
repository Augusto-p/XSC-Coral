
function options(event) {
    if (!event.target.firstElementChild) {
        event.target.offsetParent.childNodes[7].classList.toggle("active");
    }else{
        event.target.childNodes[7].classList.toggle("active")
    }
}


function recomendados() {
    document.querySelector(".recomendados").classList.toggle("active")
    
}

