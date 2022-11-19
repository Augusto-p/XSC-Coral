let Ventas = new Map();
let Usuario = document.getElementById("Select_Usuario");
let Estado = document.getElementById("Select_Estado");
let MP = document.getElementById("Select_MP");
let FechaIn = document.getElementById("Select_FechaIN");
let FechaOut = document.getElementById("Select_FechaOUT");
let TBody = document.getElementById("Tabla-Detalles");
let TBodyPop = document.getElementById("Tabla-Detalles-POPUP");
let PopUP = document.getElementById("PopUP-Window");
GatData("api/Venta/getAll", "")

function ChangeMod(value) {
    Usuario.parentElement.style.display = "none";
    Estado.parentElement.style.display = "none";
    MP.parentElement.style.display = "none";
    FechaIn.parentElement.style.display = "none";
    Usuario.value = "";
    Estado.value = "";
    MP.value = "";
    FechaIn.value = "";
    FechaOut.value = "";
    switch (value) {
        case 0:
            GatData("api/Venta/getAll", "")
            break;
        case 1:
            Usuario.parentElement.style.display = "flex";
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
async function GatData(path, body) {
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(URL + path, {
        method: "POST",
        body: body,
        headers: headersList
    });
    let data = await response.json();
    Ventas.clear();
    data.Ventas.forEach(data => {
        addCompra(data);
    });
    RefreshVentas()
}

function addCompra(data) {
    value = {
        "estado": data.Estado,
        "MPago": data.MPago,
        "FechaHora": data.FechaHora,
        "Usuario": data.Email,
        "Total": data.Total,
        "Detalles": data.Detalles
    }
    Ventas.set(data.id, value);

}

function getbyUsuario(event) {
    if (event.keyCode === 13) {
        GatData("api/Venta/getAllByUser", JSON.stringify({
            "Email": Usuario.value
        }));
    }
}

function getbyEstado() {
    GatData("api/Venta/getAllByEstado", JSON.stringify({
        "Estado": Estado.value
    }));
}
function getbyMP() {
    
    GatData("api/Venta/getAllByMPago", JSON.stringify({
            "Metodo_Pago": MP.value
        }));
}

function getbyFecha() {
    FechaOutD = new Date(FechaOut.value)
    FechaInD = new Date(FechaIn.value)
    if (FechaIn.value == FechaOut.value) {
        FechaOutD.setDate(FechaOutD.getDate() + 1);
    }
    GatData("api/Venta/getAllByFecha", JSON.stringify({
        "From": ToUTC(FechaInD),
        "To": ToUTC(FechaOutD)
    }));
}

function RefreshVentas() {
    TBody.innerHTML = "";
    for (const [id, Value] of Ventas) {
        TBody.innerHTML += `<div class="Tabla-Detalles-tr">
                <div class="Tabla-Detalles-td"><span>${id}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.Usuario}</span></div>
                <div class="Tabla-Detalles-td"><span>${FromUTC(Value.FechaHora)}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.MPago}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.estado}</span></div>
                <div class="Tabla-Detalles-td"><span>$${Value.Total}</span></div>
                <div class="Tabla-Detalles-td"><span onclick="ViewPopUP(${id})"><img
                      src="${URL}public/Recursos/icons/ver.svg"></span></div>
                <div class="Tabla-Detalles-td"><span onclick="DeleteVenta(${id})"><img
                      src="${URL}public/Recursos/icons/Papelera.svg"></span></div>
              </div>`;
    }
}

function ViewPopUP(ID) {
    CreateDetalles(ID)
    PopUP.classList.add('show-PopUp');
}
function CreateDetalles(Id) {
    TBodyPop.innerHTML = "";
    let Detalles = Ventas.get(Id).Detalles;
    console.log(Detalles);
    Detalles.forEach(Detalle => {
        TBodyPop.innerHTML = `<div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>${Detalle.ISBN}</span></div>
                                    <div class="Tabla-Detalles-td"><span>$${Detalle.Precio}</span></div>
                                    <div class="Tabla-Detalles-td"><span>$${Detalle.Descuento}</span></div>
                                    <div class="Tabla-Detalles-td"><span>${Detalle.Cantidad}</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="GoToView(${Detalle.ISBN})"><img src="${URL}public/Recursos/icons/ver.svg"></span></div>
                                </div>`;

    });


}

function ClosePopUP() {
    TBodyPop.innerHTML = "";
    PopUP.classList.remove('show-PopUp');
}



async function DeleteVenta(ID) {

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
        Ventas.delete(ID);
        RefreshVentas();
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
    else {
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