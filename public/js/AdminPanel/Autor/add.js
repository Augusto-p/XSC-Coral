let user = "auguselo77@gmail.com"


async function send(){
    let bodyContent = {
        "Token": user,
        "Autor": {
            "Nombre": Nombre.value,
            "Nacionalidad": Nacionlaidad.value,
            "Biografia": BIO.value,
            "Fnacimento": FN.value,
            "foto": await ImgToB64(await INFoto['files'][0]),
        }
    }

    
    let response = await fetch(URL + "api/autor/add", {
        method: "POST",
        body: JSON.stringify(bodyContent),
        headers: headersList
    });

    let data = await response.json();
    alert(data["mensaje"]);
    Nombre.value = "";
    Nacionlaidad.value = "";
    BIO.value = "";
    FN.value = "";
    INFoto.value = "";
    VFoto.style.visibility = "none";
    
    

    
    



}

