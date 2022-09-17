// let ISBN = document.getElementById("ISBN")
// let Titulo = document.getElementById("Titulo")
// let Precio = document.getElementById("Precio")
// let Sipnosis = document.getElementById("Sipnosis")

async function Seach(){


    let response = await fetch(URL+"/api/book/get?ISBN="+ISBN.value, {
        method: "GET",
        headers: headersList
    });

    let data = await response.json();
    Titulo.value = data.Libro.titulo
    Precio.value = data.Libro.precio
    Sipnosis.value = data.Libro.sipnosis

    Editorial.value = data.Editorial.id

    
    data.Libro.categorias.forEach(e => {
        Categoriain.value = e;
        addCat();
        
    });
    
    data.Libro.imagenes.forEach(e => {
        let Base64 = ImgToB64FromUrl(URL+e).then((Base64) =>{
            imgcont++
            ImagenesDiv.innerHTML += '<div class="Imagene-item" id="IIID-' + imgcont + '"><img src = "' + URL + e + '" ><Button type="button" onclick="delImage(' + imgcont + ')">Eliminar</Button></div>'
            nvImagesIn.innerHTML += '<input type="text" name="Img[]" class="addImagein" id="inID-' + imgcont + '" name="Imgs[]" value="' + Base64 + '">+ Añadir Imagen'
        })
        
    })

    data.Autores.forEach(e => {
        Autor.value = e.id;
        addAutor();
    })




}