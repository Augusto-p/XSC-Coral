let Vlogo = document.getElementById("Vlogo")
let INLogo = document.getElementById("Logo")
let Nombre = document.getElementById("Nombre")
let Email = document.getElementById("Email")
let Numero = document.getElementById("Numero")
let Direccion = document.getElementById("Direccion")
let Web = document.getElementById("Web")

INLogo.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        Vlogo.src = url;
        
    }
});


async function SeachEdi(){
    let ID = document.getElementById("ID").value
    Vlogo.src = ""
    Nombre.value = ""
    Email.value = ""
    Numero.value = ""
    Direccion.value = ""
    Web.value = ""

}