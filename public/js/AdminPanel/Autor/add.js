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
    if(data["code"] == 200){
        ITag({"Type": "SUCCESS","Position": "RB","Duration": 5,"Title": "Hecho!","Description": data["mensaje"]});
    }else if (data["code"] == 403){
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }
    // alert(data["mensaje"]);
    Nombre.value = "";
    Nacionlaidad.value = "";
    BIO.value = "";
    FN.value = "";
    VFoto.src = "";
    INFoto.value = "";
    
    

    
    



}

