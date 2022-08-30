let VFoto = document.getElementById("VFoto")
let INFoto = document.getElementById("Foto")
let Nombre = document.getElementById("Nombre")
let Nacionlaidad = document.getElementById("Nacionalidad")
let FN = document.getElementById("FNacimiento")
let BIO = document.getElementById("Biografia")


INFoto.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        VFoto.src = url;
        
        
    }
});
FN.style.width = Nombre.offsetWidth + "px"


async function SeachAutor() {
    let ID = document.getElementById("ID").value
    Vlogo.src = ""
    Nombre.value = ""
    Email.value = ""
    Numero.value = ""
    Direccion.value = ""
    Web.value = ""

}