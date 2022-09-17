let Vlogo = document.getElementById("Vlogo")
let INLogo = document.getElementById("Logo")
let Nombre = document.getElementById("Nombre")
let Email = document.getElementById("Email")
let Numero = document.getElementById("Numero")
let Direccion = document.getElementById("Direccion")
let Web = document.getElementById("Web")
let ID = document.getElementById("ID")
let IDValue;

INLogo.addEventListener("change", (e) => {
    Vlogo.style.visibility = "visible";
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        Vlogo.src = url;
        
    }
});


async function Seach(){
    let response = await fetch(URL+"api/editorial/get?ID="+ID.value, {
        method: "GET",
        headers: headersList
    });

    let data = await response.json().then((data) =>{
        Vlogo.src = URL +data.Editorial.logo
        Nombre.value = data.Editorial.nombre
        Email.value = data.Editorial.email
        Numero.value = data.Editorial.telefono
        Direccion.value = data.Editorial.direccion
        Web.value = data.Editorial.web
    });
    



    

}