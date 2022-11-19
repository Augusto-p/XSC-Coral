let rol = document.getElementById("Rol")
let genero = document.getElementById("genero")
let gp = document.getElementById("GP")
let deparamentos = document.getElementById("departamento")
let fn = document.getElementById("fecha")
let nombre = document.getElementById("Nombre");
let apellido = document.getElementById("Apellido");
let email = document.getElementById("Email");
let pass = document.getElementById("password");
let numero = document.getElementById("Numero");
let calle = document.getElementById("Calle");
let ciudad = document.getElementById("Ciudad");
let Codigo = document.getElementById("CPostal");
let EmailValue;


function setSize() {
    let wi = (nombre.offsetWidth-11) + 'px'
    rol.style.width = wi;
    genero.style.width = wi;
    deparamentos.style.width = wi;
    fn.style.width = wi;    
}

genero.addEventListener('change', (e) => {
    if (e.target.value != 'P') {
        gp.style.display = 'none';
    } else {
        gp.style.display = 'inline-block';

    }
});



async function Seach() {

    let bodyContent = JSON.stringify({
        "Usuario": {
            "Email": email.value
        }
    });
    headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
    let response = await fetch(`${URL}api/usuario/get`, {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });


    let data = await response.json().then((data) =>{
        if (data.code == 200) {
            nombre.value = data.User.nombrecompleto
            EmailValue = data.User.email;
            fn.value = data.User.Fnacimento
            if (data.User.Genero == "Masculino"){
                genero.value = "M";
            } else if (data.User.Genero == "Femenino") {
                genero.value = "F";
            } else {
                genero.value = "P";
                gp.value = data.User.Genero;
                gp.style.display = 'inline-block';
            }
        
            pass.value = "Dafatult"
            rol.value = data.User.rol
            numero.value = data.User.numero
            calle.value = data.User.calle
            ciudad.value = data.User.ciudad
            Codigo.value = data.User.codigoPostal
            deparamentos.value = data.User.departamento
        }else{
            ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
        }
    });
    
    

}




setSize();


