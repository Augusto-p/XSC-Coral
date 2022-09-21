let VFoto = document.getElementById("VFoto")
let INFoto = document.getElementById("Foto")
let Nombre = document.getElementById("Nombre")
let Nacionlaidad = document.getElementById("Nacionalidad")
let FN = document.getElementById("FNacimiento")
let BIO = document.getElementById("Biografia")
let ID = document.getElementById("ID")
let IDValue;

INFoto.addEventListener("change", (e) => {
    VFoto.style.visibility = "visible !important";
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        VFoto.src = url;
    }
});
FN.style.width = Nombre.offsetWidth + "px"



async function Seach() {
    let response = await fetch(URL + "api/autor/get?ID=" + ID.value, {
        method: "GET",
        headers: headersList
    });
    let data = await response.json().then(async (data) => {
        VFoto.src = URL + data.Autor.foto
        Nombre.value = data.Autor.nombre
        Nacionlaidad.value = data.Autor.nacionalidad
        FN.value = data.Autor.Fnacimento
        BIO.value = data.Autor.biografia
        IDValue = data.Autor.id
    });
}

