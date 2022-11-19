let Info = new Map();
let TBody = document.getElementById("Tabla-Detalles");
function addInfo(data) {
    value = {
        "Titulo": data.titulo,
        "Stock": data.Stock,
    }
    Info.set(data.isbn, value);
    RefreshInfo()
}

async function getInfo() {
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(`${URL}api/book/info`, {
        method: "POST",
        headers: headersList
    });

    let data = await response.json();
    data.Info.forEach(element => {
        addInfo(element);
    });
    
}

function RefreshInfo() {
    TBody.innerHTML = "";
    Style = ""
    for (const [ISBN, Value] of Info) {
        if (Value.Stock > 10) {
            Style = "background-color: #caba26;"
        }      
        TBody.innerHTML += `<div class="Tabla-Detalles-tr">
                <div class="Tabla-Detalles-td"><span>${ISBN}</span></div>
                <div class="Tabla-Detalles-td"><span>${Value.Titulo}</span></div>
                <div class="Tabla-Detalles-td"><span style="${Style}">${Value.Stock}</span></div>
              </div>`;
    }
}

getInfo()