INFoto.addEventListener("change", (e) => {
    VFoto.style.visibility = "visible !important";
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        VFoto.src = url;
    }
});
async function send() {
    let bodyContent = {
        "Token": user,
        "Autor": {
            "ID": IDValue,
            "Nombre": Nombre.value,
            "Nacionalidad": Nacionlaidad.value,
            "Biografia": BIO.value,
            "Fnacimento": FN.value,
            // "foto": await ImgToB64(await INFoto['files'][0]),
        }
    }
    
    bodyContent["Autor"]["foto"] = INFoto['files'].length > 0 ?await ImgToB64(await INFoto['files'][0]) : null   
    
    let response = await fetch(URL + "api/autor/mod", {
        method: "POST",
        body: JSON.stringify(bodyContent),
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
    document.getElementById("VFoto").src = URL + "public/Recursos/imgs/PXT.png";
    Nombre.value = "";
    Nacionlaidad.value = "";
    BIO.value = "";
    FN.value = "";
    INFoto.value = "";
    ID.value = "";
    IDValue = 0;
}




