let Barra = document.getElementById("BarradeBusqueda")
let BarraFlag = false;


function opensarch(){
    if(window.innerWidth <= 768 || BarraFlag){
        if(!BarraFlag){
            Barra.style.position = "absolute"
            Barra.style.display = "block"
            Barra.style.transform = "translate(-15vw, 7vh)"
            Barra.style.width = "30vw"
            BarraFlag = !BarraFlag
        }else{
            Barra.style.position = ""
            Barra.style.display = ""
            Barra.style.transform = ""
            Barra.style.width = ""
            BarraFlag = !BarraFlag
        }
    }
}