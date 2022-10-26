

async function ImgToB64(img) {
    return new Promise(res => {
        const Reader = new FileReader();
        Reader.onload = ({ target: { result: r } }) => res(r);
        Reader.readAsDataURL(img);
    });
}

function IDonKeyUp(event) {
    var keycode = event.keyCode;
    if (keycode == '13') {
        Seach()
    }
}


async function ImgToB64FromUrl (url){
    const data = await fetch(url);
    const blob = await data.blob();
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = () => {
            const base64data = reader.result;
            resolve(base64data);
        }
    });
}