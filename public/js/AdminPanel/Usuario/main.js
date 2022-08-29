let input = document.getElementsByClassName("inputs")[2];
let rol = document.getElementById("Rol")
let genero = document.getElementById("genero")
let gp = document.getElementById("GP")
let deparamentos = document.getElementById("departamento")
let fn = document.getElementById("fecha")

function setSize() {
    let wi = (input.offsetWidth-11) + 'px'
    rol.style.width = wi;
    genero.style.width = wi;
    deparamentos.style.width = wi;
    fn.style.width = wi;    
}

genero.addEventListener('change', (e) => {
    if (e.target.value != 'P') {
        gp.style.display = 'none';
    } else {
        gp.style.display = 'inline-block';

    }
});


setSize();