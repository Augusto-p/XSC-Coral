let ISBN = document.getElementById("ISBN")
let Titulo = document.getElementById("Titulo")
let Precio = document.getElementById("Precio")
let Sipnosis = document.getElementById("Sipnosis")

async function cargar(){
    let headersList = {
        "Accept": "*/*",
        "User-Agent": "Thunder Client (https://www.thunderclient.com)",
        "Content-Type": "application/json"
    }

    let response = await fetch(URL+"/api/book/get?ISBN="+ISBN.value, {
        method: "GET",
        headers: headersList
    });

    let data = await response.json();
    Titulo.value = data["Libro"]["titulo"]
    Precio.value = data["Libro"]["precio"]
    Sipnosis.value = data["Libro"]["sipnosis"]

    Editorial.value = data["Editorial"]["id"]

    
    data["Libro"]["categorias"].forEach(e => {
        Categoriain.value = e;
        addCat();
        
    });
    let imgs = data["Libro"]["imagenes"]

    data["Autores"].forEach(e => {
        Autor.value = e.id;
        addAutor();
    })




}