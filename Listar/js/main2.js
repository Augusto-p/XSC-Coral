// let listado = document.getElementById("ListaDeDatos")
let URL = "http://localhost/xsc/"

// let Libros = []

// function addBook(isbn) {
//     Libros.push(isbn)

// }

async function cargar() {
    let headersList = {
        "Accept": "*/*",
        "User-Agent": "Thunder Client (https://www.thunderclient.com)",
        "Content-Type": "application/json"
    }

    let response = await fetch(URL + "/api/book/get?ISBN=9788448025373", {
        method: "GET",
        headers: headersList
    });

    let data = await response.json();
    console.log(data);



}



// addBook(9788448025373)
cargar()
