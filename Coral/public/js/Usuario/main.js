let inputs = document.getElementsByClassName('inputs');
let entrar = document.getElementById('entrar');


window.addEventListener('resize', setsize);
function setsize() {
    entrar.style.width = (inputs[0].offsetWidth -77) + 'px';
}

function ConfirmedPasword(pass1,pass2) {
    if (pass1 == pass2){
        return true;
    }else{
        return false;
    }
    
}


function goTo(url) {
    let a = document.createElement("a");
    a.href = url;
    a.click()
}