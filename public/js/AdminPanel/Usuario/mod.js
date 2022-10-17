async function Send() {

    let bodyContent = JSON.stringify({
        "Usuario": {
            "Nombre": nombre.value,
            "Email": email.value,
            "Fecha_Nacimento": fn.value,
            "Genero": genero.value,
            "Genero_Personalisado": gp.value,
            "Password": pass.value,
            "Rol": rol.value,
            "Numero": numero.value,
            "Calle": calle.value,
            "Ciudad": ciudad.value,
            "Codigo_Postal": Codigo.value,
            "Departamento": deparamentos.value

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