let inslider1 = document.getElementById("slider1in")
let inslider2 = document.getElementById("slider2in")
let slider1Div = document.getElementById("slider1Div")
let slider2Div = document.getElementById("slider2Div")
let nvSlider1 = document.getElementById("notView-s1")
let nvSlider2 = document.getElementById("notView-s2")
let url = document.getElementById("URL").value

let slider1 = []
let slider2 = []

function addslider1php(isbn){
    if (isbn != "") {
        slider1.push(isbn+"")
        slider1Div.innerHTML = ""
        nvSlider1.innerHTML = ""
        slider1.forEach(id => {
            
            nvSlider1.innerHTML += '<input type="text" name="Slider1[]" value="' + id + '" >' 
            slider1Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider1(' + id + ')"  class="remove"><img src="' + url +'public/Recursos/icons/delete.svg"></button></div>'
        });
    }

}
function addslider2php(isbn){
    if (isbn != "") {
        slider2.push(isbn + "")
        slider2Div.innerHTML = ""
        nvSlider2.innerHTML = ""
        slider2.forEach(id => {
            nvSlider2.innerHTML += '<input type="text" name="Slider2[]" value="' + id + '">'  
            slider2Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider2(' + id + ')"  class="remove"><img src="' + url +'public/Recursos/icons/delete.svg"></button></div>'
        });
    }
}

function addslider1(){
    if (slider1.length < 10) {
        isbn = inslider1.value
        if (isbn != "") {
            slider1.push(isbn)
            slider1Div.innerHTML = ""
            nvSlider1.innerHTML = ""
            slider1.forEach(id => {
                nvSlider1.innerHTML += '<input type="text" name="Slider1[]" value="' + id + '">' 
                slider1Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider1(' + id + ')"  class="remove"><img src="' + url +'public/Recursos/icons/delete.svg"></button></div>'
            });

            inslider1.value = ""
        }
        
    }else{
        alert("maximo de 10 Libros Elimine Alguno")
    }
    
}

function addslider2() {
    if (slider2.length < 10) {
        isbn = inslider2.value
        if (isbn != "") {
            slider2.push(isbn)
            slider2Div.innerHTML = ""
            nvSlider2.innerHTML = ""
            slider2.forEach(id => {
                nvSlider2.innerHTML += '<input type="text" name="Slider2[]" value="' + id + '">' 
                slider2Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider2(' + id + ')"  class="remove"><img src="' + url +'public/Recursos/icons/delete.svg"></button></div>'
            });

            inslider2.value = ""
        }
        
    } else {
        alert("maximo de 10 Libros Elimine Alguno")
    }

}

function verbook(id){
    let win = window.open(URL + "book/view?id="+id, '_blank');
    win.focus();
}

function delslider2(id){
    
    slider2 = slider2.filter((item) => item !== `${id}`)
    slider2Div.innerHTML = ""
    slider2.forEach(id => {
        slider2Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider2(' + id + ')"  class="remove"><img src="' + url + 'public/Recursos/icons/delete.svg"></button></div>'
    });


}

function delslider1(id) {
    slider1 = slider1.filter((item) => item !== `${id}`)
    slider1Div.innerHTML = ""
    slider1.forEach(id => {
        slider1Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="' + url + 'public/Recursos/icons/ver.svg"></button><button type="button" onclick="delslider1(' + id + ')"  class="remove"><img src="' + url + 'public/Recursos/icons/delete.svg"></button></div>'
    });



}

let vBanerP = document.getElementById("VBanerP")
let vBanerP1 = document.getElementById("VBanerP1")
let vBanerP2 = document.getElementById("VBanerP2")
let inBanerP = document.getElementById("PBaner")
let inBanerP1 = document.getElementById("PP1Baner")
let inBanerP2 = document.getElementById("PP2Baner")

inBanerP.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        vBanerP.src = url;
    }
})

inBanerP1.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        vBanerP1.src = url;
    }
})

inBanerP2.addEventListener("change", (e) => {
    let file = e.target.files[0];
    if (file) {
        let url = URL.createObjectURL(file);
        vBanerP2.src = url;
    }
})

