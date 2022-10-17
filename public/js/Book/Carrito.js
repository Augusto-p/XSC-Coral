let headersList = {
    "Accept": "*/*",
    "User-Agent": "Thunder Client (https://www.thunderclient.com)",
    "Content-Type": "application/json"
}

let Listado = document.getElementById("ListaDeDatos");

async function delCarrito(ISBN){
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let bodyContent = JSON.stringify({
        "Book": ISBN
    });

    let response = await fetch(URL + "api/carrito/delete", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
        document.getElementById(`cesta-${ISBN}`).parentElement.removeChild(document.getElementById(`cesta-${ISBN}`));
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }


}


async function getCarrito() {
    
    // let bodyContent = JSON.stringify({
    //     "Token": user
    // });
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL +"api/carrito/get", {
        method: "POST",
        // body: bodyContent,
        headers: headersList
    });

    await response.json().then(data => {
        Listado.innerHTML = "";
        data.Carrito.forEach(carro => {
            crateCarrito(carro.Book)
        });
        
    })
    

    
}

function crateCarrito(book) {
    let Autores = "";
    book.Autores.forEach(autor => {
        Autores += `<img src="${URL+autor.foto}" onclick="goTo('${URL}book?Autor=${autor.id}')">
                        <h6 onclick="goTo('${URL}book?Autor=${autor.id}')">${autor.nombre}</h6>`
    });

    Listado.innerHTML += `<div class="list-item noselect" id="cesta-${book.isbn}">
                <div class="list-item-img" >
                    <img src="${URL+book.imagenes[0]}">
                </div>
                <div class="list-item-data">
                    <div class="list-item-data-up" onclick="goTo('${URL}book/view?id=${book.isbn}')">
                        <h2>${book.titulo}</h2>
                    </div>
                    <div class="list-item-data-center" onclick="goTo('${URL}book/view?id=${book.isbn}')">
                        <p>${book.sipnosis}</p>
                    </div>
                    <div class="list-item-data-down">${Autores}</div>
                </div>
                <div class="list-item-sale">
                    <div class="list-item-sale-ultra-up">
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="item-menu">
                            <button onclick="goTo('${URL}book/view?id=${book.isbn}')">Ver Libro</button>
                            <!-- <button>Ver Categoria</button> -->
                            <button onclick="goTo('${URL}book?Editorial=${book.IDEditorial}')">Ver Editorial</button>
                            <hr>
                            <button class="remoCarr" onclick="delCarrito(${book.isbn})">Remover del Carrito</button>
                        </div>
                    </div>
                    <div class="list-item-sale-up" onclick="goTo('${URL}book/view?id=${book.isbn}')">
                        <h3>$ ${book.precio}</h3>
                    </div>
                    <div class="list-item-sale-down">
                        <button class="remoCarr" onclick="delCarrito(${book.isbn})">Remover del Carrito</button>
                    </div>
                </div>
            
            
            </div>`;
    
}





getCarrito()