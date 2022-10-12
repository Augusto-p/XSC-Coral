const URL = document.getElementById("URL").value;
const Buscar = document.getElementById("BarradeBusqueda")
function SeachBar() {
    goTo(`${URL}book?Seach=${Buscar.value}`)
}
Buscar.value = new URLSearchParams(window.location.search).get("Seach");
function goTo(url) {
    a = document.createElement("a");
    a.href = url;
    a.click()
}

function getCookie(name) {
    return document.cookie.split('; ').filter(Cookie => Cookie.includes(name + "="))[0].replace(name + "=", "");
}

function enterSach(event) {
    
        var keycode = event.keyCode;
        if (keycode == '13') {
            SeachBar()
        }
    
}