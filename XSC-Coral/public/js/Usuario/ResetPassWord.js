setsize();
let pass = document.getElementById("password")
let rpass = document.getElementById("rpassword")
let form_olv_new_pass = document.getElementById("form-olv-new-pass")

function SendNewPassword(){
    if (ConfirmedPasword(pass.value, rpass.value)) {
        form_olv_new_pass.submit()
    }else{
        alert("La Confirmacion De la Contraseña debe ser igual a la conteaseña")
    }

}