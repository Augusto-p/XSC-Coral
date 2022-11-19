let pass = document.getElementById("password");
let Npass = document.getElementById("Npassword");
let RNpass = document.getElementById("RNpassword");


async function Send() {

    if (Npass.value != RNpass.value) {
        ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": "error en la validacion de contraseña" });
    }else{
        let bodyContent = JSON.stringify({
            "Usuario": {
                "oldPass": pass.value,
                "newpass": Npass.value
            }
        });
        
        headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
        let response = await fetch(URL + "api/usuario/newpass", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });


        let data = await response.json();
        
    
        if (data["code"] == 200) {
            ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
            pass = "";
            Npass = "";
            RNpass = "";
        } else if (data["code"] == 403) {
            ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
        } else if (data["code"] == 404) {
            ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
        }
    
    }
}
