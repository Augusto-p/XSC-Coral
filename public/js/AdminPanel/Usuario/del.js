async function Send() {

    let bodyContent = JSON.stringify({
        "Usuario": {
            "Email": email.value,
        }
    });
    headersList["Authorization"] = "Token " + getCookie("Token");
    let response = await fetch(URL + "api/usuario/delete", {
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
    email.value = ""
    fn.value = ""
    genero.value = ""
    gp.value = ""
    pass.value = ""
    rol.value = "Cliente"
    numero.value = ""
    calle.value = ""
    ciudad.value = ""
    Codigo.value = ""
    deparamentos.value = ""
}