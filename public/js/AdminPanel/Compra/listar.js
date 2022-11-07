let Compras = new Map();
let Editorial = document.getElementById("Select_Editorial");
let Estado = document.getElementById("Select_Estado");
let MP = document.getElementById("Select_MP");
let FechaIn = document.getElementById("Select_FechaIN");
let FechaOut = document.getElementById("Select_FechaOUT");
let TBody = document.getElementById("Tabla-Detalles");
let TBodyPop = document.getElementById("Tabla-Detalles-POPUP");
let PopUP = document.getElementById("PopUP-Window");

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

function ChangeMod(value) {
    Editorial.parentElement.parentElement.style.display = "none";
    Estado.parentElement.style.display = "none";
    MP.parentElement.style.display = "none";
    FechaIn.parentElement.style.display = "none";
    Editorial.value = "";
    Estado.value = "";
    MP.value = "";
    FechaIn.value = "";
    FechaOut.value = ""; 
    switch (value) {
        case 0:
            GatData("api/compra/getAll", "")
            break;
        case 1:
            Editorial.parentElement.parentElement.style.display = "flex";
            break;
        case 2:
            Estado.parentElement.style.display = "flex";
            break;
        case 3:
            MP.parentElement.style.display = "flex";
            break;
        case 4:
            FechaIn.parentElement.style.display = "flex";
            break;
        default:
            break;
    }

}

function addCompra(data) {
    value = {
        "estado": data.estado,
        "MPago": data.MPago,
        "FechaHora": data.FechaHora,
        "Editorial": data.Editorial,
        "Total": data.Total,
        "Detalles": data.Detalles
    }
    Compras.set(data.id, value);
    
}

function RefreshCompras() {
    TBody.innerHTML = "";
    for (const [id, Value] of Compras) {
        TBody.innerHTML += `<div class="Tabla-Detalles-tr">
                <div class="Tabla-Detalles-td"><span>${id}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.Editorial}</span></div>
                <div class="Tabla-Detalles-td"><span>${FromUTC(Value.FechaHora)}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.MPago}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.estado}</span></div>
                <div class="Tabla-Detalles-td"><span>$${Value.Total}</span></div>
                <div class="Tabla-Detalles-td"><span onclick="ViewPopUP(${id})"><img
                      src="${URL}public/Recursos/icons/ver.svg"></span></div>
                <div class="Tabla-Detalles-td"><span onclick="DeleteCompra(${id})"><img
                      src="${URL}public/Recursos/icons/Papelera.svg"></span></div>
              </div>`;
    }
}

async function GatData(path, body) {
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL+path, {
        method: "POST",
        body: body,
        headers: headersList
    });

    let data = await response.json();
    Compras.clear();

    data.Compras.forEach(data => {
        addCompra(data);
    });
    RefreshCompras();

    
}

function getbyEditorial() {
    GatData("api/compra/getAllByEditorial", JSON.stringify({
        "IDEditorial": Editorial.value
    }));
}

function getbyEstado() {
    GatData("api/compra/getAllByEstado", JSON.stringify({
        "Estado": Estado.value
    }));
}
function getbyMP(event) {
    if (event.keyCode === 13) {
        GatData("api/compra/getAllByMPago", JSON.stringify({
            "Metodo_Pago": MP.value
        }));
    }
}

function getbyFecha() {
    FechaOutD = new Date(FechaOut.value)
    FechaInD = new Date(FechaIn.value)
    if (FechaIn.value == FechaOut.value){
        FechaOutD.setDate(FechaOutD.getDate() + 1);
    }
    GatData("api/compra/getAllByFecha", JSON.stringify({
        "From": ToUTC(FechaInD),
        "To": ToUTC(FechaOutD)
    }));
}

function GoToView(ISBNV){
    let a = document.createElement("a");
    a.href = `${URL}book/view?id=${ISBNV}`;
    a.target = "_blank"
    a.click()
}


function CreateDetalles(Id) {
    TBodyPop.innerHTML = "";
    let Detalles = Compras.get(Id).Detalles;
    Detalles.forEach(Detalle => {
        TBodyPop.innerHTML = `<div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>${Detalle.ISBN}</span></div>
                                    <div class="Tabla-Detalles-td"><span>$${Detalle.PUnitario}</span></div>
                                    <div class="Tabla-Detalles-td"><span>${Detalle.Cantidad}</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="GoToView(${Detalle.ISBN})"><img src="${URL}public/Recursos/icons/ver.svg"></span></div>
                                </div>`;
        
    });

    
}

function ViewPopUP(ID) {
    CreateDetalles(ID)
    PopUP.classList.add('show-PopUp');
}

function ClosePopUP() {
    TBodyPop.innerHTML = "";
    PopUP.classList.remove('show-PopUp');
}


async function DeleteCompra(ID) {
    
    let bodyContent = JSON.stringify({
        "ID": ID
    });
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(`${URL}api/compra/delete`, {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    if (data.code == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
        Compras.delete(ID);
        RefreshCompras();
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": "Contacte Con un Administrador" });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });        
    }
    console.log(data);

    
}


function ScrollTable(mode) {
    let Head = document.querySelector(".Tabla-Detalles-Thead");
    if (mode) {
        TBody.scrollLeft = Head.scrollLeft;
    }
    else{
        Head.scrollLeft = TBody.scrollLeft;
    }

}

function ScrollTablePop(mode) {
    let Head = document.querySelector(".PopUP-form .Tabla-Detalles-Thead");
    let Body = document.querySelector(".PopUP-form .Tabla-Detalles-Tbody");
    if (mode) {
        Body.scrollLeft = Head.scrollLeft;
    }
    else {
        Head.scrollLeft = Body.scrollLeft;
    }

}

GatData("api/compra/getAll", "")


refresheditoriales()