scroll(0, 0)
let formsls = document.getElementById('form-sls');
let input = document.getElementsByClassName('inputs')[0];
let genero = document.getElementById("genero");
let FNacimento = document.getElementById('fecha');
let btnSigiente = document.getElementById('Sig');
let btnSend = document.getElementById('send');
let IGlobal = document.getElementById('i-global');
let foto = document.getElementById('foto');
let gp = document.getElementById('GP');
let rpass = document.getElementById('rpassword');
let pass = document.getElementById('password');

let yesImg = document.getElementById('yes-image');
let noImg = document.getElementById('not-image');
let fotoImg = document.getElementById('foto-img');



function setSize() {
    btnSend.style.width = input.offsetWidth + 'px';
    fecha.style.width = input.offsetWidth + 'px';
    genero.style.width = input.offsetWidth + 'px';
    btnSigiente.style.width = input.offsetWidth + 'px';
    IGlobal.style.width = input.offsetWidth + 'px';
    IGlobal.style.height = (input.offsetHeight *3) + 'px';
    foto.style.width = input.offsetWidth + 'px';
    foto.style.height = (input.offsetHeight *3) + 'px';
    fotoImg.style.height = (input.offsetHeight * 3) + 'px';
    
    
}


function sigiente() {
    formsls.style.animationName = 'sigiente';
}
function permanteSigiente(){
    formsls.style.transform = 'translateX(-42vw)';
}
function vpass() {
    if (pass.value == rpass.value) {
        rpass.style.borderColor = 'green';
        pass.style.borderColor = 'green';
    } else {
        rpass.style.borderColor = 'red';
        pass.style.borderColor = 'red';
    }
}
btnSigiente.addEventListener('click', sigiente, false);
formsls.addEventListener('animationend', permanteSigiente, false);
window.addEventListener('resize', setSize, false);
pass.addEventListener('keyup', vpass, false);
rpass.addEventListener('keyup', vpass, false);
genero.addEventListener('change', (e) => {
    if (e.target.value != 'P') {
        gp.style.display = 'none';
    } else {
        gp.style.display = 'inline-block';

    }
});

foto.addEventListener('change', (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        noImg.style.display = 'none';
        yesImg.style.display = 'flex';
        fotoImg.src = url;
    } else {
        noImg.style.display = 'flex';
        yesImg.style.display = 'none';
    }
});





setSize();

