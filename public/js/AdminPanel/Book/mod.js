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
        Categoriain.value = e;
        addCat();
    });

    data.Libro.imagenes.forEach(e => {
        let Base64 = ImgToB64FromUrl(URL + e).then((Base64) => {
            imgcont++
            ImagenesDiv.innerHTML += '<div class="Imagene-item" id="IIID-' + imgcont + '"><img src = "' + URL + e + '" ><Button type="button" onclick="delImage(' + imgcont + ')">Eliminar</Button></div>'
            nvImagesIn.innerHTML += '<input type="text" name="Imgs[]" class="addImagein" id="inID-' + imgcont + '" name="Imgs[]" value="' + Base64 + '">+ Añadir Imagen'
        })

    })

    data.Autores.forEach(e => {
        Autor.value = e.id;
        addAutor();
    })
}


async function Send() {
    let CategoriasS = [];
    document.querySelectorAll('input[name="Categorias[]"]').forEach(e => {
        CategoriasS.push(e.value)
    });

    let AutoresS = [];
    document.querySelectorAll('input[name="IDSAutores[]"]').forEach(e => {
        AutoresS.push(e.value)
    });

    let promesas = [];
    document.querySelectorAll('input[name="Imgs[]"]').forEach(e => {
        if (e.type == "file") {
            promesas.push(ImgToB64(e['files'][0]))
        }else{
            promesas.push(e.value)
        }
        
    });
    Promise.all(promesas).then((imgs) => {
        let bodyContent = JSON.stringify({
            "Libro": {
                "ISBN": ISBN.value,
                "Titulo": Titulo.value,
                "Precio": Precio.value,
                "Categorias": CategoriasS,
                "IDSAutor": AutoresS,
                "Sipnosis": Sipnosis.value,
                "IDEditorial": Editorial.value,
                "Imagenes": imgs
            }
        });
        headersList["Authorization"] = "Token " + getCookie("Token");
        let response = fetch("http://localhost/xsc/api/book/mod", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        return response;
    }).then((r) => {
        let data = r.json();
        return data
    }).then(data =>{
        console.log(data["code"]);
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
        // CategoriasDiv.childNodes.forEach(bc => { 
        //     console.log(bc);
        //     bc.children[1].click() })
        // AutoresDiv.childNodes.forEach(ba => { ba.children[1].click() })
        ImagenesDiv.childNodes.forEach(bi => {bi.lastChild.onclick()});
        
        
        
        Categorias.clear()
        Autores.clear();
        refreshAutoresDiv()
        refreshCategoriasDiv()
    }

    );


}