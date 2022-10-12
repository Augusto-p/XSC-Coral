
async function send() {
    let bodyContent = {
        "Autor": {"id": IDValue}
    }
    headersList["Authorization"] = "Token " + getCookie("Token");
    let response = await fetch(URL + "api/autor/delete", {
        method: "POST",
        body: JSON.stringify(bodyContent),
        headers: headersList
    });

    let data = await response.json();
    console.log(data);
    
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
    ID.value = "";
    IDValue = 0;
}




