let inputs = document.getElementsByClassName('inputs');
let entrar = document.getElementById('entrar');



window.addEventListener('resize', setsize);
function setsize() {
    entrar.style.width = inputs[0].offsetWidth + 'px';
}
setsize();
