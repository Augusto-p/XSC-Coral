const ProductoContainers = [...document.querySelectorAll('.producto-container')];
const boton2 = [...document.querySelectorAll('.boton2')];
const boton1 = [...document.querySelectorAll('.boton1')];

ProductoContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    
    boton2[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })
    
        boton1[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
    })
})