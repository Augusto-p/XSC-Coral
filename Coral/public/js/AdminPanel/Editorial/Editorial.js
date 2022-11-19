let Vlogo = document.getElementById("Vlogo")
let INLogo = document.getElementById("Logo")
let Nombre = document.getElementById("Nombre")
let Email = document.getElementById("Email")
let Numero = document.getElementById("Numero")
let Direccion = document.getElementById("Direccion")
let Web = document.getElementById("Web")
let ID = document.getElementById("ID")
let IDValue;



async function Seach(){
    let response = await fetch(URL+"api/editorial/get?ID="+ID.value, {
        method: "GET",
        headers: headersList
    });

    let data = await response.json().then((data) =>{
        IDValue = data.Editorial.id
        Vlogo.src = URL + data.Editorial.logo
        Nombre.value = data.Editorial.nombre
        Email.value = data.Editorial.email
        Numero.value = data.Editorial.telefono
        Direccion.value = data.Editorial.direccion
        Web.value = data.Editorial.web
    });
    



    

}