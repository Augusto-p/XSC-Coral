// Sliders
let Slider1Items = [];
let Slider2Items = [];
let Slider1Position = 2;
let Slider2Position = 2;
let Slider1 = document.getElementsByClassName('slider-content-in')[0];
let Slider2 = document.getElementsByClassName('slider-content-in')[1];



function AddSlider1(ISBN, Titulo, Precio, Img) {
    Slider1Items.push({
        "ISBN": ISBN,
        "Precio": Precio,
        "Titulo": Titulo,
        "Img": Img
    });
}
function AddSlider2(ISBN, Titulo, Precio, Img) {
    Slider2Items.push({
        "ISBN": ISBN,
        "Precio": Precio,
        "Titulo": Titulo,
        "Img": Img
    });
}

function CreateSliderItem(data) {
    return `<a onclick="goTo('${URL}book/view?id=${data.ISBN}')">
                <div class="slider-item">
                    <div class="slider-item-up"
                    style="background-image: url('${data.Img}')">
                        <div class="slider-item-up-up">
                            <span class="slider-item-precio">$${data.Precio}</span>
                        </div>
                        <div class="slider-item-up-down">
                            <button class="slider-item-addCarito"
                            onclick="AddCarritoHome(event,${data.ISBN})">Añadir al carrito</button>
                        </div>
                    </div>
                    <div class="slider-item-down">
                        <h2 class="slider-item-titulo">${data.Titulo}</h2>
                    </div>
                </div>
            </a>`;

}

function StartSliders() {
    for (let i = -1; i < 6; i++) {
        a = i < 0 ? (Slider1Items.length -1) : i
        Slider1.innerHTML += CreateSliderItem(Slider1Items[a]);
    }
    for (let i = -1; i < 6; i++) {
        a = i < 0 ? (Slider2Items.length -1) : i
        Slider2.innerHTML += CreateSliderItem(Slider2Items[a]);
    }
}

function MoveSlider1(mode, Interval) {
    if (!Interval) {
        clearInterval(slider1timer);
    }
    if (mode == "NEXT") {
        Slider1.style.animation = (300 < window.innerWidth) && (window.innerWidth < 768) ? "sliderAnimasionNR 2s normal" : "sliderAnimasionN 2s normal";
        Slider1.removeChild(Slider1.firstElementChild);
        Slider1Position = Slider1Position + 1 == Slider1Items.length ? 0 : Slider1Position + 1
        Slider1.appendChild(HTMLtoElemnt(CreateSliderItem(Slider1Items[Slider1Position + 3 >= Slider1Items.length ? (Slider1Position + 3) - Slider1Items.length : Slider1Position + 3])));
    } else {
        Slider1Position = Slider1Position - 1 < 0 ? Slider1Items.length - 1 : Slider1Position - 1;
        Slider1.insertBefore(HTMLtoElemnt(CreateSliderItem(Slider1Items[Slider1Position - 3 < 0 ? Slider1Items.length + (Slider1Position - 3) : Slider1Position - 3])), Slider1.firstChild);
        Slider1.style.animation = (300 < window.innerWidth) && (window.innerWidth < 768) ? "sliderAnimasionBR 2s normal" : "sliderAnimasionB 2s normal";
        Slider1.removeChild(Slider1.lastElementChild);
    }
    document.getElementsByClassName('slider-pointer')[0].querySelector(".slider-pointer-item.active").classList.toggle("active");
    document.getElementsByClassName('slider-pointer')[0].querySelectorAll(".slider-pointer-item")[Slider2Position].classList.toggle("active");
}

function MoveSlider2(mode, Interval) {
    if (!Interval) {
        clearInterval(slider2timer);
    }
    if (mode == "NEXT") {
        Slider2.style.animation = (300 < window.innerWidth) && (window.innerWidth < 768) ? "sliderAnimasionNR 2s normal" : "sliderAnimasionN 2s normal";
        Slider2.removeChild(Slider2.firstElementChild)
        Slider2Position = Slider2Position + 1 == Slider2Items.length ? 0 : Slider2Position + 1;
        Slider2.appendChild(HTMLtoElemnt(CreateSliderItem(Slider2Items[Slider2Position + 3 >= Slider2Items.length ? (Slider2Position + 3) - Slider2Items.length : Slider2Position + 3])));
    } else {
        Slider2Position = Slider2Position - 1 < 0 ? Slider2Items.length - 1 : Slider2Position - 1;
        Slider2.insertBefore(HTMLtoElemnt(CreateSliderItem(Slider2Items[Slider2Position - 3 < 0 ? Slider2Items.length + (Slider2Position - 3) : Slider2Position - 3])), Slider2.firstChild);
        Slider2.style.animation = (300 < window.innerWidth) && (window.innerWidth < 768) ? "sliderAnimasionBR 2s normal" : "sliderAnimasionB 2s normal";
        Slider2.removeChild(Slider2.lastElementChild)
    }
    document.getElementsByClassName('slider-pointer')[1].querySelector(".slider-pointer-item.active").classList.toggle("active");
    document.getElementsByClassName('slider-pointer')[1].querySelectorAll(".slider-pointer-item")[Slider2Position].classList.toggle("active");
}
Slider1.addEventListener("animationend", () => { Slider1.style.animation = "none"; })
Slider2.addEventListener("animationend", () => { Slider2.style.animation = "none"; })

let slider1timer = setInterval(() => { MoveSlider1("NEXT", true); }, 5000);
let slider2timer = setInterval(() => { MoveSlider2("NEXT", true); }, 5000);


function PXtoVW(px) {
    return Math.round(px * (100 / document.documentElement.clientWidth));
}
function HTMLtoElemnt(html) {
    let div = document.createElement('div');
    div.innerHTML = html.trim();
    return div.firstChild;
}

// Carrito
function AddCarritoHome(event, ISBN) {
    event.stopPropagation();
    addCarrito(ISBN)
}
