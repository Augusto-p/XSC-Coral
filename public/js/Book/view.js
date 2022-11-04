
let btnSliderS = document.getElementById("btn-slider-s");
let btnSliderA = document.getElementById("btn-slider-a");
let sliderimg = document.getElementById("slider-book-image");
let pointersPack = document.getElementById("book-image-pointer-section");
let bookimages = [];
let bookAutores = new Map();


function run() {
    uploadimage()
    uploadAutor()
    // uploadPaises()
    
}

function addbookimage(url) {
    bookimages.push(url);
}

function addbookAutor(id, nombre, nacionalidad, biografia, fechaNacimiento, foto) {
    bookAutores.set(bookAutores.size, { "id": id,
                                        "nombre": nombre, 
                                        "Nacionalidad": nacionalidad,
                                        "Biografia": biografia,
                                        "FNacimento": fechaNacimiento,
                                        "foto": foto});
}

function uploadimage() {
    sliderimg.src = bookimages[0]
    for (let index = 0; index < bookimages.length; index++) {
        pointersPack.innerHTML += `<div class="book-image-pointer"></div>`;
        
    }
    pointersPack.children[0].style.backgroundColor = "#145075";

    pointersPack.childNodes.forEach(element => {
        element.addEventListener("click", function () {
            
            pointersPack.children[cont].style.backgroundColor = "#e0e0e0";
            cont = Array.from(pointersPack.children).indexOf(element);
            sliderimg.src = bookimages[cont];
            pointersPack.children[cont].style.backgroundColor = "#145075";
            
        })
    });


}

let cont = 0;
btnSliderS.addEventListener("click", function () {
    if (cont == bookimages.length-1) {
        sliderimg.src = bookimages[0];
        cont=0;
        pointersPack.lastElementChild.style.backgroundColor = "#e0e0e0";
    } else {
        cont++;
        sliderimg.src = bookimages[cont];
        pointersPack.children[cont-1].style.backgroundColor = "#e0e0e0";
    }
    pointersPack.children[cont].style.backgroundColor = "#145075";
});

btnSliderA.addEventListener("click", function () {
    if (cont == 0) {
        cont=bookimages.length - 1;
        sliderimg.src = bookimages[bookimages.length - 1];
        pointersPack.children[0].style.backgroundColor = "#e0e0e0";
    } else {
        cont--;
        sliderimg.src = bookimages[cont];
        pointersPack.children[cont+1].style.backgroundColor = "#e0e0e0";
    }
    pointersPack.children[cont].style.backgroundColor = "#145075";
});


function getdate(date){
    let datearray = date.split("-");
    let day = datearray[2];
    let month = datearray[1];
    let year = datearray[0];
    switch (month) {
        case "01":
            month = "Enero";
            break;
        case "02":
            month = "Febrero";
            break;
        case "03":
            month = "Marzo";
            break;
        case "04":
            month = "Abril";
            break;
        case "05":
            month = "Mayo";
            break;
        case "06":
            month = "Junio";
            break;
        case "07":
            month = "Julio";
            break;
        case "08":
            month = "Agosto";
            break;
        case "09":
            month = "Setiembre";
            break;
        case "10":
            month = "Octubre";
            break;
        case "11":
            month = "Noviembre";
            break;
        case "12":
            month = "Diciembre";
            break;
    }
    return `${day} de ${month} del ${year}`;


}

let autorPointers = document.getElementById("slider-autor-pointers-div");
let autorbtna = document.getElementById("btn-autor-a");
let autorbtns = document.getElementById("btn-autor-s");
let acont = 0;





function uploadAutor() {
    let autor = bookAutores.get(0);
    document.getElementById("img-autor-book").src = autor.foto;
    document.getElementById("nombre-autor-book").textContent = autor.nombre;
    document.getElementById("data-autor-book-na-in").textContent = autor.Nacionalidad;
    document.getElementById("bio-autor-book").textContent = autor.Biografia;
    document.getElementById("data-autor-book-fn-in").textContent = getdate(autor.FNacimento);
    document.getElementById("autor-image-country").src = getFlag(autor.Nacionalidad);
    for (let index = 0; index < bookAutores.size; index++) {
        autorPointers.innerHTML += `<div class="slider-autor-pointer"></div>`;
    }
    autorPointers.children[0].style.backgroundColor = "#145075";
    autorPointers.childNodes.forEach(element => {
        element.addEventListener("click", function () {
            autorPointers.children[acont].style.backgroundColor = "#e0e0e0";
            acont = Array.from(autorPointers.children).indexOf(element);
            autor = bookAutores.get(acont);
            document.getElementById("img-autor-book").src = autor.foto;
            document.getElementById("nombre-autor-book").textContent = autor.nombre;
            document.getElementById("data-autor-book-na-in").textContent = autor.Nacionalidad;
            document.getElementById("bio-autor-book").textContent = autor.Biografia;
            document.getElementById("data-autor-book-fn-in").textContent = getdate(autor.FNacimento);
            document.getElementById("autor-image-country").src = getFlag(autor.Nacionalidad);
            autorPointers.children[acont].style.backgroundColor = "#145075";
        })
    });
}

autorbtns.addEventListener("click", function () {
    if (acont == bookAutores.size-1) {
        acont=0;
        autorPointers.lastElementChild.style.backgroundColor = "#e0e0e0";

    } else {
        acont++;
        autorPointers.children[acont-1].style.backgroundColor = "#e0e0e0";
    }
    autor = bookAutores.get(acont);
    document.getElementById("img-autor-book").src = autor.foto;
    document.getElementById("nombre-autor-book").textContent = autor.nombre;
    document.getElementById("data-autor-book-na-in").textContent = autor.Nacionalidad;
    document.getElementById("bio-autor-book").textContent = autor.Biografia;
    document.getElementById("data-autor-book-fn-in").textContent = getdate(autor.FNacimento);
    document.getElementById("autor-image-country").src = getFlag(autor.Nacionalidad);
    autorPointers.children[acont].style.backgroundColor = "#145075";
});

autorbtna.addEventListener("click", function () {
    if (acont == 0) {
        acont=bookAutores.size - 1;
        autorPointers.children[0].style.backgroundColor = "#e0e0e0";
    } else {
        acont--;
        autorPointers.children[acont+1].style.backgroundColor = "#e0e0e0";
    }
    autor = bookAutores.get(acont);
    document.getElementById("img-autor-book").src = autor.foto;
    document.getElementById("nombre-autor-book").textContent = autor.nombre;
    document.getElementById("data-autor-book-na-in").textContent = autor.Nacionalidad;
    document.getElementById("bio-autor-book").textContent = autor.Biografia;
    document.getElementById("data-autor-book-fn-in").textContent = getdate(autor.FNacimento);
    document.getElementById("autor-image-country").src = getFlag(autor.Nacionalidad);
    autorPointers.children[acont].style.backgroundColor = "#145075";
});


function getFlag(Country) {
    return URL + "public/Recursos/icons/flags/" + Paises.filter(pais => pais["nombre"].toLowerCase() == Country.toLowerCase())[0].iso2.toLowerCase() + ".svg";
}

