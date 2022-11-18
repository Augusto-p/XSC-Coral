async function Seach() {
    let response = await fetch(URL + "/api/book/get?ISBN=" + ISBN.value, {
        method: "GET",
        headers: headersList
    });

    let data = await response.json();
    Titulo.value = data.Libro.titulo
    Precio.value = data.Libro.precio
    Sipnosis.value = data.Libro.sipnosis

    Editorial.value = data.Editorial.id
    ImagenesDiv.innerHTML = "";
    nvImagesIn.innerHTML = "";
    Categorias.clear();

    data.Libro.categorias.forEach(e => {
        CategoriasDiv.innerHTML += '<div class="categorias-Item-div"><h4>' + e + '</h4><div>'
    });

    data.Libro.imagenes.forEach(e => {
        let Base64 = ImgToB64FromUrl(URL + e).then((Base64) => {
            imgcont++
            ImagenesDiv.innerHTML += '<div class="Imagene-item" id="IIID-' + imgcont + '"><img src = "' + URL + e + '" ></div>'
            
        })

    })

    data.Autores.forEach(e => {
        Autor.value = e.id;
        let text = Autor.options[Autor.selectedIndex].text
        AutoresDiv.innerHTML += '<div class="Autor-Item-div" id="AID-' + e.id + '"><h4>' + text + '</h4><div>'
    })
    Autor.value = "";
    
    
    
}


async function Send() {
    let bodyContent = JSON.stringify({
        "Libro": {
            "ISBN": ISBN.value
        }
    });
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(`${URL}api/book/delete`, {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });
    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });

    }
    else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }
    
    ISBN.value = null;
    Titulo.value = "";
    Precio.value = "";
    Sipnosis.value = "";
    Editorial.value = "";
    Autor.value = "";    
    CategoriasDiv.innerText = "";
    AutoresDiv.innerHTML = "";
    ImagenesDiv.innerHTML = "";
    

}

Editorial.style.width = input.offsetWidth + 'px';