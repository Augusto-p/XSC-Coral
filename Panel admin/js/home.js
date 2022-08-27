let inslider1 = document.getElementById("slider1in")
let inslider2 = document.getElementById("slider2in")
let slider1Div = document.getElementById("slider1Div")
let slider2Div = document.getElementById("slider2Div")
let URL = document.getElementById("URL")

let slider1 = []
let slider2 = []

function addslider1(){
    if (slider1.length < 10) {
        isbn = inslider1.value
        if (isbn != "") {
            slider1.push(isbn)
            slider1Div.innerHTML = ""
            slider1.forEach(id => {
                slider1Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="../../Recursos/icons/ver.svg"></button><button type="button" onclick="delslider1(' + id + ')"  class="remove"><img src="../../Recursos/icons/delete.svg"></button></div>'
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
            slider2.forEach(id => {
                slider2Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="../../Recursos/icons/ver.svg"></button><button type="button" onclick="delslider2(' + id + ')"  class="remove"><img src="../../Recursos/icons/delete.svg"></button></div>'
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
        slider2Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="../../Recursos/icons/ver.svg"></button><button type="button" onclick="delslider2(' + id + ')"  class="remove"><img src="../../Recursos/icons/delete.svg"></button></div>'
    });


}

function delslider1(id) {

    slider1 = slider1.filter((item) => item !== `${id}`)
    slider1Div.innerHTML = ""
    slider1.forEach(id => {
        slider1Div.innerHTML += '<div class="slider-Item-div"><h4>' + id + '</h4><button type="button" onclick="verbook(' + id + ')" class="view"><img src="../../Recursos/icons/ver.svg"></button><button type="button" onclick="delslider1(' + id + ')"  class="remove"><img src="../../Recursos/icons/delete.svg"></button></div>'
    });



}