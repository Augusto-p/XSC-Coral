



let user = "auguselo77@gmail.com";
async function SeachISBN() {
    let response = await fetch("https://www.googleapis.com/books/v1/volumes?q=isbn:" + ISBN.value, {
        method: "GET",
    });
    let data = await response.json();
    if (data["items"][0]["volumeInfo"]["title"] != undefined) {
        Titulo.value = data["items"][0]["volumeInfo"]["title"];
    }
    if (data["items"][0]["volumeInfo"]["description"] != undefined) {
        Sipnosis.value = data["items"][0]["volumeInfo"]["description"];
    }
}






async function Send(){
    let Categorias = [];
    document.querySelectorAll('input[name="Categorias[]"]').forEach(e => {
        Categorias.push(e.value)
    });

    let Autores = [];
    document.querySelectorAll('input[name="IDSAutores[]"]').forEach(e => {
        Autores.push(e.value)
    });

    let promesas = [];
    document.querySelectorAll('input[name="Imgs[]"]').forEach( e => {
        promesas.push(
            ImgToB64(e['files'][0])
        )
    });
    Promise.all(promesas).then((imgs) =>{
        let bodyContent = JSON.stringify({
        "Token": user,
        "Libro": {
            "ISBN": ISBN.value,
            "Titulo": Titulo.value,
            "Precio": Precio.value,
            "Categorias": Categorias,
            "IDSAutor": Autores,
            "Sipnosis": Sipnosis.value,
            "IDEditorial": Editorial.value,
            "Imagenes": imgs
        }
        });
        let response = fetch("http://localhost/xsc/api/book/add", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

    return response;        
        
    }).then((response)=>{
        let data = response.json();
        alert(data["mensaje"])
        ISBN.value = "";
        Titulo.value = "";
        Precio.value = "";
        Sipnosis.value = "";
        Editorial.value = ""; 
        Autor.value = "";
        CategoriasDiv.innerHTML = "";
        AutoresDiv.innerHTML = "";
        ImagenesDiv.innerHTML = "";
        nvAutorIn.innerHTML = ""; 
        nvCategoriasIn.innerHTML = "";
        nvImagesIn.innerHTML = "";
        Categoriain.value = "";
    }
        
    );


}