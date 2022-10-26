const URL = document.getElementById("URL").value;
const Buscar = document.getElementById("BarradeBusqueda")
function SeachBar() {
    goTo(`${URL}book?Seach=${Buscar.value}`)
}
Buscar.value = new URLSearchParams(window.location.search).get("Seach");
function goTo(url) {
    let a = document.createElement("a");
    a.href = url;
    a.click()
}

function getCookie(name) {
    return document.cookie.split('; ').filter(Cookie => Cookie.includes(name + "="))[0].replace(name + "=", "");
}

function enterSach(event) {
    
        let keycode = event.keyCode;
        if (keycode == '13') {
            SeachBar()
        }
    
}
function ToUTC(date) {
    let actualTime = new Date();
    let Dif = actualTime.getTimezoneOffset();
    date = new Date(date.toUTCString().slice(0, (-Dif / 60)));
    return `${date.getUTCFullYear()}-${date.getUTCMonth() + 1}-${date.getUTCDate()} ${date.getUTCHours()}:${date.getUTCMinutes()}:${date.getUTCSeconds()}`;
}

function FromUTC(date) {
    date = new Date(date);
    let actualTime = new Date();
    let Dif = actualTime.getTimezoneOffset();
    date.setMinutes(date.getUTCMinutes() - Dif)
    return `${date.getFullYear()}-${date.getMonth() + 1 > 9 ? date.getMonth() + 1 : "0" + (date.getMonth() + 1)}-${date.getDate() > 9 ? date.getDate() : "0" + date.getDate()} ${date.getHours() > 9 ? date.getHours() : "0" + date.getHours()}:${date.getMinutes() > 9 ? date.getMinutes() : "0" + date.getMinutes()}:${date.getSeconds() > 9 ? date.getSeconds() : "0" + date.getSeconds()}`;
}

let headersList = {
    "Accept": "*/*",
    "User-Agent": "Thunder Client (https://www.thunderclient.com)",
    "Content-Type": "application/json"
}

async function addCarrito(ISBN) {
    
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let bodyContent = JSON.stringify({
        "Book": ISBN
    });

    let response = await fetch(URL + "api/carrito/add", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    if (data["code"] == 200) {
        ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
    } else if (data["code"] == 403) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
    } else if (data["code"] == 404) {
        ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
    }
}