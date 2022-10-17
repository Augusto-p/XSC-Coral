async function send() {
    let bodyContent = {
        "Editorial": {
            "id": IDValue
        }
    }
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL + "api/editorial/delete", {
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
    Nombre.value = "";
    Numero.value = "";
    Direccion.value = "";
    Email.value = "";
    Web.value = "";
    document.getElementById("Vlogo").src = URL + "public/Recursos/imgs/PXT.png";
    IDValue = 0;
    ID.value = "";
}