let Categoriain = document.getElementById("Categoriain")
let CategoriasDiv = document.getElementById("CategoriasDiv")
let input = document.getElementsByClassName("inputs")[0]
let Editorial = document.getElementById("Editorial")
let Autor = document.getElementById("Autor")
let AutoresDiv = document.getElementById("AutoresDiv")
let nvAutorIn = document.getElementById("not-view-Autores")
let nvCategoriasIn = document.getElementById("not-view-Categorias")
let nvImagesIn = document.getElementById("not-view-images")
let btnAddImge = document.getElementById("addImage")
let ImagenesDiv = document.getElementById("ImagenesDiv")

let Categorias = new Map();
let Autores = new Map();




cont = 0
function addCat(){
    cont++
    let dato = Categoriain.value;
    dato = dato.toLowerCase()
    dato = dato[0].toUpperCase() + dato.slice(1)
    Categorias.set(cont, dato)
    Categoriain.value = "";
    refreshCategoriasDiv()
}


function addAutor(){
    let text = Autor.options[Autor.selectedIndex].text
    let id = Autor.value
    Autores.set(id, text)
    refreshAutoresDiv()
}
function refreshAutoresDiv() {
    AutoresDiv.innerHTML = ""
    nvAutorIn.innerHTML = ""
    for (let [key, value] of Autores.entries()) {
        AutoresDiv.innerHTML += '<div class="Autor-Item-div" id="AID-'+key+'"><h4>' + value + '</h4><button type="button" onclick="delAutor(' + key + ')" class="remove"><img src="../../Recursos/icons/delete.svg"></button><div>'
        nvAutorIn.innerHTML += '<input type="number" name="IDSAutores[]" value="' + key + '" id="InA-' + key +'">'
    }
}

function refreshCategoriasDiv(){
    CategoriasDiv.innerHTML = ""
    nvCategoriasIn.innerHTML =""
    for (let [key, value] of Categorias.entries()) {
        CategoriasDiv.innerHTML += '<div class="categorias-Item-div"><h4>' + value + '</h4><button type="button" data-id="' + key +'"class="remove"><img src="../../Recursos/icons/delete.svg"></button><div>'
        nvCategoriasIn.innerHTML += '<input type="text" name="Categorias[]" value="'+value+'">'
    }

    CategoriasDiv.childNodes.forEach(element => {
        let btn = element.childNodes[1]
        btn.addEventListener("click", function () {
            Categorias.delete(parseInt(btn.dataset.id))
            refreshCategoriasDiv()
        })
    });
}

function setSize() {
    
    Editorial.style.width = (input.offsetWidth - 25) + 'px';
    Autor.style.width = (input.offsetWidth - 45) + 'px';
}

imgcont = 0
function NewImage() {
    imgcont++
    btnAddImge.innerHTML = '<input type="file" name="Img[]" class="addImagein" >+ Añadir Imagen'
    let element = btnAddImge.firstChild
    
    element.addEventListener("change", (e) => {
        let file = e.target.files[0];
        if (file) {
            let url = URL.createObjectURL(file);
            ImagenesDiv.innerHTML += '<div class="Imagene-item" id="IIID-' + imgcont + '"><img src = "' + url +'" ><Button type="button" onclick="delImage('+imgcont+')">Eliminar</Button></div>'
            element.id = "inID-"+imgcont
            nvImagesIn.insertBefore(element, null);
            NewImage()
        }
        })
    
}

function delImage(id){
    let div = document.getElementById(`IIID-${id}`)
    let inimag = document.getElementById(`inID-${id}`)
    div.parentNode.removeChild(div)
    inimag.parentNode.removeChild(inimag)
}

function delAutor(id){
    let inAutor = document.getElementById(`InA-${id}`)
    let viewAutor = document.getElementById(`AID-${id}`)
    inAutor.parentNode.removeChild(inAutor)
    viewAutor.parentNode.removeChild(viewAutor)
}


setSize()
NewImage() 