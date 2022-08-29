let ISBN = document.getElementById("ISBN");
let Titulo = document.getElementById("Titulo");
let Sipnosis = document.getElementById("Sipnosis");
async function SeachISBN() {


let response = await fetch("https://www.googleapis.com/books/v1/volumes?q=isbn:"+ISBN.value, { 
  method: "GET",
});

let data =  await response.json();
if (data["items"][0]["volumeInfo"]["title"] != undefined) {
  Titulo.value = data["items"][0]["volumeInfo"]["title"];
}

if (data["items"][0]["volumeInfo"]["description"] != undefined){
  Sipnosis.value = data["items"][0]["volumeInfo"]["description"];
}
  


}