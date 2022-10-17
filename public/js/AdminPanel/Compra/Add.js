let Detalles = new Map();
let Editorial = document.getElementById("Editorial");
let TBody = document.getElementById("Tabla-Detalles");
let PopUP = document.getElementById("PopUP-Window");
let ISBN = document.getElementById("ISBN");
let IMGBook = document.getElementById("PopUP-form-data-img-img");
let PU = document.getElementById("PU");
let Cant = document.getElementById("Cantidad");
let FCompra = document.getElementById("FCompra");
let Mpago = document.getElementById("MPago")
let Estado = document.getElementById("Estado")

async function refresheditoriales() {
    let response = await fetch(URL + "api/editorial/getAll", {
        method: "GET",
    });
    let data = await response.json();
    let Editoriales = data["Editoriales"]
    Editorial.innerHTML = "<option value='' selected disabled>Editorial</option>"
    Editoriales.forEach(e => {
        Editorial.innerHTML += "<option value=" + e.id + " >" + e.nombre + "</option>"
    })


}

function addDetalle(ISBN, PU, Cant) {
    Detalles.set(ISBN, {
        "Precio": PU,
        "Cantidad": Cant

    });
    RefreshTBody();
}

function DelDetalle(ISBN) {
    
    Detalles.delete(`${ISBN}`);
    RefreshTBody();
}

function RefreshTBody(){
    TBody.innerHTML = "";
    for (const [ISBN, Value] of Detalles) {
        let PU = Value["Precio"];
        let Cant = Value["Cantidad"];
        TBody.innerHTML += `<div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>${ISBN}</span></div>
                                    <div class="Tabla-Detalles-td"><span>${PU}</span></div>
                                    <div class="Tabla-Detalles-td"><span>${Cant}</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle(${ISBN})"><img src="${URL}public/Recursos/icons/edit.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle(${ISBN})"><img src="${URL}public/Recursos/icons/Papelera.svg"></span></div>
                                </div>`;

        
    }

}

function BuscarImg(event){
    if (event.keyCode === 13) {
        GetImage()
    }
}

async function GetImage(){
    let response = await fetch(URL +"api/book/get?ISBN="+ISBN.value, {
        method: "GET",
        headers: headersList
    });
    let data = await response.json();
    if (data["mensaje"] == "Error") {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": "El Libro no esta Registrado en el Sistema" });
    }else{
        IMGBook.style.backgroundImage = `url(${URL}${data.Libro.imagenes[0]})`;
    }
}

function newDetalle() {
    addDetalle(ISBN.value, PU.value, Cant.value);
    ISBN.value = null;
    PU.value = null;
    Cant.value = null;
    IMGBook.style.backgroundImage = null;
}

function CloseDetalle() {
    PopUP.classList.remove('show-PopUp');
}

function OpenDetalle() {
    PopUP.classList.add('show-PopUp');
}

function AceptarDetalle() {
    newDetalle()
    CloseDetalle()
}


async function Send() {
    let DetallesList = [];
    for (const [ISBN, Value] of Detalles) {
        let PU = Value["Precio"];
        let Cant = Value["Cantidad"];
        DetallesList.push({
            "ISBN": ISBN,
            "Precio_Unitario": PU,
            "Cantidad": Cant
        })
    }
    let bodyContent = JSON.stringify({
        "Compra": {
            "IDEditorial": Editorial.value,
            "Metodo_Pago": Mpago.value,
            "Estado": Estado.value,
            "FechaHora": FCompra.value,
            "Detalles": DetallesList
        }
    });
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL+"api/compra/add", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
        Editorial.value = null;
        Mpago.value = null;
        Estado.value = null;
        FCompra.value = null;
        Detalles.clear();
        RefreshTBody()

    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }

    
}


function EditDetalle(ISBNV){
    Detalle = Detalles.get(`${ISBNV}`);
    ISBN.value = ISBNV;
    PU.value = Detalle.Precio;
    Cant.value = Detalle.Cantidad;
    GetImage()
    OpenDetalle()
}






















refresheditoriales()