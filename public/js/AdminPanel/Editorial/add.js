let user = "auguselo77@gmail.com";


async function send() {
    let bodyContent = {
        "Token": user,
        "Editorial": {
            "Nombre": Nombre.value,
            "Telefono": Numero.value,
            "Direccion": Direccion.value,
            "Email": Email.value,
            "Web": Web.value,
            "Logo": await ImgToB64(await INLogo['files'][0])
        }
    }
    


    let response = await fetch(URL + "api/editorial/add", {
        method: "POST",
        body: JSON.stringify(bodyContent),
        headers: headersList
    });

    let data = await response.json();

    alert(data["mensaje"]);
    Nombre.value = "";
    Numero.value = "";
    Direccion.value = "";
    Email.value = "";
    Web.value = "";
    INLogo.value = "";
    Vlogo.style.visibility = "hidden";
}
