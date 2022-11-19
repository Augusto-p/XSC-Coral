let genero = document.getElementById("genero")
let gp = document.getElementById("GP")
let ImgV = document.querySelector(".cuentaHederImg")
let deparamentos = document.getElementById("departamento")
let fn = document.getElementById("fecha")
let nombre = document.getElementById("Nombre");
let numero = document.getElementById("Numero");
let calle = document.getElementById("Calle");
let ciudad = document.getElementById("Ciudad");
let Codigo = document.getElementById("CPostal");
let foto = document.getElementById("Image")

foto.addEventListener('change', (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        ImgV.style.backgroundImage = `url(${url})`
    } 
});


genero.addEventListener('change', (e) => {
    if (e.target.value != 'P') {
        gp.style.display = 'none';
    } else {
        gp.style.display = 'inline-block';

    }
});

async function Send() {

    let bodyContent = JSON.stringify({
        "Usuario": {
            "Nombre": nombre.value,
            "Fecha_Nacimento": fn.value,
            "Genero": genero.value,
            "Genero_Personalisado": gp.value,
            "Numero": numero.value,
            "Calle": calle.value,
            "Ciudad": ciudad.value,
            "Codigo_Postal": Codigo.value,
            "Departamento": deparamentos.value,
            
            "Imagen": foto['files'][0] !== undefined? await ImgToB64(await foto['files'][0]): ""
        }
        });
        
        
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL + "api/usuario/mod", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });
    

    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }
    nombre.value = ""
    fn.value = ""
    gp.value = ""
    numero.value = ""
    calle.value = ""
    ciudad.value = ""
    Codigo.value = ""
    deparamentos.value = ""
}

