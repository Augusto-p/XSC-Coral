let btnSlider1 = document.getElementById('btn-slider-1');
let btnSlider2 = document.getElementById('btn-slider-2');
let btnSlider3 = document.getElementById('btn-slider-3');
let btnSlider4 = document.getElementById('btn-slider-4');
let slider1Content = document.getElementsByClassName('slider-content-in')[0];
let slider1PointersBox = document.getElementsByClassName('slider-pointer')[0];
let slider2Content = document.getElementsByClassName('slider-content-in')[1];
let slider2PointersBox = document.getElementsByClassName('slider-pointer')[1];
let slider1Pointers = [];
let slider2Pointers = [];

for (pointer in slider1PointersBox.children) {
    slider1Pointers.push(slider1PointersBox.children[pointer]);
}

for (pointer in slider2PointersBox.children) {
    slider2Pointers.push(slider2PointersBox.children[pointer]);
}

btnSlider2.addEventListener('click', function () {
    clearInterval(slider1timer);
    slider1Move('next', slider1Content, slider1Pointers);

});


btnSlider1.addEventListener('click', function () {

    clearInterval(slider1timer);
    slider1Move('previous', slider1Content, slider1Pointers);


});

btnSlider4.addEventListener('click', function () {
    clearInterval(slider2timer);
    slider2Move('next', slider2Content, slider2Pointers);
});

btnSlider3.addEventListener('click', function () {
    clearInterval(slider2timer);
    slider2Move('previous', slider2Content, slider2Pointers);
});


function slider1Move(mode, sliderContent, pointers) {
    let transform = sliderContent.style.transform
    let valor;
    if (transform == "") {
        valor = 0;
    } else {
        valor = parseInt(transform.replace("translateX(", "").replace("vw)", ""))
    }
    if (mode == 'next') {
        if (valor <= -153) {
            valor = 0;
        }
        else {
            valor = valor - 17;
        }

        if (pointerValue >= 9) {
            pointerValue = 0;
            pointers[9].style.backgroundColor = '#000';
        }
        else {
            pointerValue++;
            pointers[pointerValue - 1].style.backgroundColor = '#000';
        }
    }
    if (mode == 'previous') {
        if (valor >= 0) {
            valor = -153;
        }
        else {
            valor = valor + 17;
        }

        if (pointerValue <= 0) {
            pointerValue = 9;
            pointers[0].style.backgroundColor = '#000';
        }
        else {
            pointerValue = pointerValue - 1;
            pointers[pointerValue + 1].style.backgroundColor = '#000';
        }

    }
    pointers[pointerValue].style.backgroundColor = '#71eba1';
    sliderContent.style.transform = 'translateX(' + valor + 'vw)';


}

function slider2Move(mode, sliderContent, pointers) {
    let transform = sliderContent.style.transform
    let valor;
    if (transform == "") {
        valor = 0;
    } else {
        valor = parseInt(transform.replace("translateX(", "").replace("vw)", ""))
    }
    if (mode == 'next') {
        if (valor <= -153) {
            valor = 0;
        }
        else {
            valor = valor - 17;
        }

        if (pointerValue2 >= 9) {
            pointerValue2 = 0;
            pointers[9].style.backgroundColor = '#000';
        }
        else {
            pointerValue2++;
            pointers[pointerValue2 - 1].style.backgroundColor = '#000';
        }
    }
    if (mode == 'previous') {
        if (valor >= 0) {
            valor = -153;
        }
        else {
            valor = valor + 17;
        }

        if (pointerValue2 <= 0) {
            pointerValue2 = 9;
            pointers[0].style.backgroundColor = '#000';
        }
        else {
            pointerValue2 = pointerValue2 - 1;
            pointers[pointerValue2 + 1].style.backgroundColor = '#000';
        }

    }
    pointers[pointerValue2].style.backgroundColor = '#71eba1';
    sliderContent.style.transform = 'translateX(' + valor + 'vw)';


}




//seteos slider 1
slider1Content.appendChild(slider1Content.children[0].cloneNode(true));
slider1Content.appendChild(slider1Content.children[1].cloneNode(true));
slider1Content.appendChild(slider1Content.children[2].cloneNode(true));
slider1Content.appendChild(slider1Content.children[3].cloneNode(true));
let pointerValue = 2;
slider1Pointers[pointerValue].style.backgroundColor = '#71eba1';

let slider1timer = setInterval(() => { slider1Move('next', slider1Content, slider1Pointers); }, 3000);

//seteos slider 2
slider2Content.appendChild(slider2Content.children[0].cloneNode(true));
slider2Content.appendChild(slider2Content.children[1].cloneNode(true));
slider2Content.appendChild(slider2Content.children[2].cloneNode(true));
slider2Content.appendChild(slider2Content.children[3].cloneNode(true));
let pointerValue2 = 2;
slider2Pointers[pointerValue2].style.backgroundColor = '#71eba1';

let slider2timer = setInterval(() => { slider2Move('next', slider2Content, slider2Pointers); }, 3000);


function AddCarritoHome(event, ISBN) {
    event.stopPropagation();
    addCarrito(ISBN)
}