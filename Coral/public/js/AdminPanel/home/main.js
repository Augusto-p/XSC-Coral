// baneers
let vBanerP = document.getElementById("VBanerP")
let vBanerP1 = document.getElementById("VBanerP1")
let vBanerP2 = document.getElementById("VBanerP2")
let inBanerP = document.getElementById("PBaner")
let inBanerP1 = document.getElementById("PP1Baner")
let inBanerP2 = document.getElementById("PP2Baner")

inBanerP.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        vBanerP.src = url;
    }
})

inBanerP1.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        vBanerP1.src = url;
    }
})

inBanerP2.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = window.URL.createObjectURL(file);
        vBanerP2.src = url;
    }
})

// Sliders
let MapSlider1 = new Map();
let MapSlider2 = new Map();
let DivSlider1 = document.getElementById("slider1Div");
let DivSlider2 = document.getElementById("slider2Div");
let InputSlider1 = document.getElementById("slider1in");
let InputSlider2 = document.getElementById("slider2in");

function AddSlider1(ISBN) {
    MapSlider1.set(ISBN);
    RefreshSlider1()
}
function AddSlider2(ISBN) {
    MapSlider2.set(ISBN);
    RefreshSlider2()
}
function DelSlider1(ISBN) {
    MapSlider1.delete(ISBN);
    RefreshSlider1()
}
function DelSlider2(ISBN) {
    MapSlider2.delete(ISBN);
    RefreshSlider2()
}

function RefreshSlider1() {
    DivSlider1.innerHTML = "";   
    for (const ISBN of MapSlider1.keys()) {
        DivSlider1.innerHTML += `<div class="slider-Item-div"><h4>${ISBN}</h4>
        <button type="button" onclick="GoToView(${ISBN})" class="view">
        <img src="${URL}public/Recursos/icons/ver.svg"></button>
        <button type="button" onclick="DelSlider1(${ISBN})" class="remove">
        <img src="${URL}public/Recursos/icons/delete.svg"></button></div>`;
    }
}
function RefreshSlider2() {
    DivSlider2.innerHTML = "";
    for (const ISBN of MapSlider2.keys()) {
        DivSlider2.innerHTML += `<div class="slider-Item-div"><h4>${ISBN}</h4>
        <button type="button" onclick="GoToView(${ISBN})" class="view">
        <img src="${URL}public/Recursos/icons/ver.svg"></button>
        <button type="button" onclick="DelSlider2(${ISBN})" class="remove">
        <img src="${URL}public/Recursos/icons/delete.svg"></button></div>`;
    }
}

function AddInputSlider1() {
    ISBN = parseInt(InputSlider1.value, 10);
    if (ISBN) {
        if (MapSlider1.size < 10) {
            AddSlider1(ISBN);
            InputSlider1.value = null;
        }else{
            ITag({ "Type": "INFO", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": "Existe un Maximo de 10 libros en el Slider" });
            InputSlider1.value = null;
        }
    }
}
function AddInputSlider2() {
    ISBN = parseInt(InputSlider2.value, 10);
    if (ISBN) {
        if (MapSlider2.size < 10) {
            AddSlider2(ISBN);
            InputSlider2.value = null;
        } else {
            ITag({ "Type": "INFO", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": "Existe un Maximo de 10 libros en el Slider" });
            InputSlider2.value = null;
        }
    }
}

async function Send() {
    let Slider1 = [];
    let Slider2 = [];
    for (const ISBN of MapSlider1.keys()) {
        Slider1.push({"ISBN":String(ISBN)})  
    }
    
    for (const ISBN of MapSlider2.keys()) {
        Slider2.push({ "ISBN": String(ISBN) })
    }


    let promesas = [];
    if (inBanerP['files'][0] !== undefined) {
        promesas.push(ImgToB64Name(inBanerP['files'][0], "Banner_Principal"))
    }
    if (inBanerP1['files'][0] !== undefined) {

        promesas.push(ImgToB64Name(inBanerP1['files'][0], "Banner_Uno"))
    }
    if (inBanerP2['files'][0] !== undefined) {
        promesas.push(ImgToB64Name(inBanerP2['files'][0], "Banner_Dos"))
    }
    
    Promise.all(promesas).then((imgs) => {
        let bodyContent = JSON.stringify({
            "Home": {
                "Banners": imgs,
                "Slider1": Slider1,
                "Slider2": Slider2
            }
        });
        headersList["Authorization"] = "Token " + sessionStorage.getItem("Token");
        let response = fetch(`${URL}api/Home/mod`, {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });
        return response;
    }).then((response) => {
        let data = response.json();
        return data
    }).then(data =>{
        if (data["code"] == 200) {
            ITag({ "Type": "SUCCESS", "Position": "RB", "Duration": 5, "Title": "Hecho!", "Description": data["mensaje"] });
            inBanerP['files'][0].value = null;
            inBanerP1['files'][0].value = null;
            inBanerP2['files'][0].value = null;
        } else if (data["code"] == 403) {
            ITag({ "Type": "ERROR", "Position": "RB", "Duration": 5, "Title": "Error!", "Description": data["mensaje"] });
        } else if (data["code"] == 404) {
            ITag({ "Type": "WARNING", "Position": "RB", "Duration": 5, "Title": "Advertencia!", "Description": data["mensaje"] });
        }

    });
}

async function ImgToB64Name(img,Name) {
    return new Promise(res => {
        const Reader = new FileReader();
        Reader.onload = ({ target: { result: r } }) => res([Name, r]);
        Reader.readAsDataURL(img);
    });
}