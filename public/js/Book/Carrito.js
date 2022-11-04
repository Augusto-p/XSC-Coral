let Carrito = new Map();
let Listado = document.getElementById("ListaDeDatos");
let PopUP = document.getElementById("PopUP-Window");
let PopUPInfo = document.getElementById("PopUP-Window2");
let TBodyPop = document.getElementById("Tabla-Detalles-POPUP");
let PopUpTotal = document.getElementById("popUpTotal")
let MetodoPagioPopUp2 = document.getElementById("Mpag-popUp");
let SenvioPopUp2 = document.getElementById("SYSPaceteria");
let DescripcionPopUp2 = document.getElementById("descripcion-popUp");
let Total = 0;
function addcarrito(book) {
    Carrito.set(book.isbn, book);
    refreshCarritos()
}
function delcarrito(isbn) {
    Carrito.delete(isbn);
    refreshCarritos()
    CargrarItemsPopUp();
}

async function GetCrritos() {
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL + "api/carrito/get", {
        method: "POST",
        headers: headersList
    });

    await response.json().then(data => {
        data.Carrito.forEach(carro => {
            addcarrito(carro.Book);
        });
    })
}

function refreshCarritos() {
    Listado.innerHTML = ""
    for (const [isbn, book] of Carrito) {
        let Autores = "";
        book.Autores.forEach(autor => {
            Autores += `<img src="${URL + autor.foto}" onclick="goTo('${URL}book?Autor=${autor.id}')">
                        <h6 onclick="goTo('${URL}book?Autor=${autor.id}')">${autor.nombre}</h6>`
        });
        Listado.innerHTML += `<div class="list-item noselect" id="cesta-${book.isbn}">
                <div class="list-item-img" >
                    <img src="${URL + book.imagenes[0]}">
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
            
            
            </div>`


    }
    
}

async function delCarrito(ISBN) {
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
        delcarrito(ISBN)
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }


}

//end new zone
function filtroCantidad(event) {

    if (['.', 'e', '-', '+'].includes(event.key) || event.target.value == '0')
        event.preventDefault()
}

function ChangeCant(event, id) {
    let TotalValore = event.target.value * Carrito.get(id).precio
    let TotalView = event.target.parentElement.parentElement.parentElement.childNodes[9].firstChild
    cahngetotal(TotalView.innerHTML, TotalValore)
    TotalView.innerHTML = `$${parseFloat(TotalValore).toFixed(2)}`
}

function ViewPopUP() {
    if (Carrito.size > 0) {
        CargrarItemsPopUp()
        PopUP.classList.add('show-PopUp');
    }else{
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Lo Sentimos", "Description": "Su Carrito se encuntra Vacio" });
    }
}

function ClosePopUP() {
    TBodyPop.innerHTML = "";
    PopUP.classList.remove('show-PopUp');
}

function CargrarItemsPopUp() {
    TBodyPop.innerHTML = "";
    for (const [isbn, book] of Carrito) {
        Total += parseFloat(book.precio);
        TBodyPop.innerHTML += `<div class="Tabla-Detalles-tr">
            <div class="Tabla-Detalles-td"><span>${isbn}</span></div>
            <div class="Tabla-Detalles-td"><span>${book.titulo}</span></div>
            <div class="Tabla-Detalles-td"><span>$${parseFloat(book.precio).toFixed(2)}</span></div>
            <div class="Tabla-Detalles-td"><span><input type="number" data-ISBN="${isbn}" min="1" step="1" class="inputs"  placeholder="Cantidad" onkeydown="filtroCantidad(event)" max="1000" onchange="ChangeCant(event, ${isbn})" value=1></span></div>
            <div class="Tabla-Detalles-td"><span>$${parseFloat(book.precio).toFixed(2)}</span></div>
            <div class="Tabla-Detalles-td"><span onclick="RemovePopUpDetalle(${isbn})"><img src="${URL}public/Recursos/icons/Papelera.svg"></span></div>
            </div>`;
    }
    cahngetotal("$0", 0);    
        
    
    
}

function cahngetotal(old, nuevo) {
    old = parseFloat(old.replace('$', ''));
    Total -= old;
    Total += nuevo;
    PopUpTotal.innerText = `Total: $${Total.toFixed(2)}`;
}

function RemovePopUpDetalle(isbn) {
    delCarrito(isbn);
    
}

async function Send(Body) {
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(`${URL}api/venta/add`, {
        method: "POST",
        body: Body,
        headers: headersList
    });

    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
        GetCrritos()
        refreshCarritos()
    } else if (data["code"] == 201){
        ITag({ "Type": "LOG", "Position": "RT", "Duration": 5, "Title": "Sin Stock!", "Description": data["mensaje"] });
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }


}

function Pagar() {
    let Detalles = []
    let InputsCantisad = document.querySelectorAll("#Tabla-Detalles-POPUP input[type='number']")
    InputsCantisad.forEach(inp =>{
        Detalles.push({
            "ISBN": inp.dataset.isbn,
            "Descuento": 0,
            "Cantidad": inp.value

        })
    })
    ClosePopUP()
    localStorage.setItem("Detalles-Compra", JSON.stringify(Detalles));
    ViewPopUPInfo()
        
}

function ViewPopUPInfo() {
    
    PopUPInfo.classList.add('show-PopUp');
}

function ClosePopUPInfo() {
    PopUPInfo.classList.remove('show-PopUp');
}

function finalizar() {

    let bodyContent = JSON.stringify({
        "Venta": {
            "Metodo_Pago": `${MetodoPagioPopUp2.value}`,
            "Estado": "Enviado",
            "Pedido": {
                "Sistema_Envio": `${SenvioPopUp2.value}`,
                "Descripcion": `${DescripcionPopUp2.value}`
            },
            "Detalles": JSON.parse(localStorage.getItem("Detalles-Compra"))

        }
    });

    MetodoPagioPopUp2.value = SenvioPopUp2.value = DescripcionPopUp2.value = "";
    Send(bodyContent);
    ClosePopUPInfo()
    

}
GetCrritos()

// boton sale
let PoniterElemnt = document.querySelector(".PointersBTNSale#Element")
let PoniterWindows = document.querySelector(".PointersBTNSale#window")
let BTNSale = document.getElementById("BTNSale")
window.addEventListener('scroll', e => {
    if ((PoniterElemnt.getBoundingClientRect().bottom - PoniterWindows.getBoundingClientRect().bottom) > 0) {
        BTNSale.style.position = "fixed";
    } else {
        BTNSale.style.position = "absolute";
    }
});




