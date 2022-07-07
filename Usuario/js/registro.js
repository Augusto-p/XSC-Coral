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

let vH = window.innerHeight / 100;



function setmindate(){
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();
    let day = date.getDate();
    if (day <10){
        day = '0' + day;
    }
    if (month <10){
        month = '0' + month;
    }
    FNacimento.max = (year -18) + '-' + month + '-' + day;
    FNacimento.value = year + '-' + month + '-' + day;
}




    

function setSize() {
    btnSend.style.width = input.offsetWidth + 'px';
    fecha.style.width = input.offsetWidth + 'px';
    genero.style.width = input.offsetWidth + 'px';
    btnSigiente.style.width = (input.offsetWidth -10) + 'px';
    IGlobal.style.width = (input.offsetWidth - (2 * vH)) + 'px';
    IGlobal.style.height = (input.offsetHeight *3) + 'px';
    //get 1 window height
    
    

    foto.style.width = input.offsetWidth + 'px';
    foto.style.height = (input.offsetHeight *3) + 'px';
    fotoImg.style.height = (input.offsetHeight * 3) + 'px';
    
    
}


function sigiente() {
    console.log("hello");
    
    if (window.innerWidth > 768) {
        formsls.style.animationName = 'sigienteDesk';
        
    }else{
        formsls.style.animationName = 'sigienteMov';

    }


}
function permanteSigiente(){
    if (window.innerWidth > 768) {
        formsls.style.transform = 'translateX(-38vw)';
    }else{
        formsls.style.transform = 'translateX(-75vw)';
    }
    
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
setmindate();

