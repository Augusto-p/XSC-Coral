INLogo.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        Vlogo.src = url;

    }
});



async function send() {
    let bodyContent = {
        "Editorial": {
            "Nombre": Nombre.value,
            "Telefono": Numero.value,
            "Direccion": Direccion.value,
            "Email": Email.value,
            "Web": Web.value,
            "Logo": await ImgToB64(await INLogo['files'][0])
        }
    }
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");


    let response = await fetch(URL + "api/editorial/add", {
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
    INLogo.value = "";
    Vlogo.src = URL + "public/Recursos/imgs/PXT.png";
}
