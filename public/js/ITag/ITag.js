
function ITag(params){
    let type = params.Type;
    let posicion = params.Position;
    let duracion = params.Duration;
    let titulo = params.Title;
    let descripcion = params.Description;

    let IDInsatance = Math.floor(Math.random()*10000000000000)
    let BGColor;
    let FontColor;
    let Draw;
    let animationInName;
    let animationOutName;
    let defaultPosision;

    switch (type.toLowerCase()) {
        case "success":
            BGColor = "#31c896";
            FontColor = "#fff";
            Draw = '<path d="M18.9 35.7 7.7 24.5l2.15-2.15 9.05 9.05 19.2-19.2 2.15 2.15Z" />';
            break;
        case "error":
            BGColor = "#cc0000";
            FontColor = "#fff";
            Draw = '<path d="M24 44q-4.15 0-7.8-1.575-3.65-1.575-6.35-4.275-2.7-2.7-4.275-6.35Q4 28.15 4 24t1.575-7.8Q7.15 12.55 9.85 9.85q2.7-2.7 6.35-4.275Q19.85 4 24 4t7.8 1.575q3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24t-1.575 7.8q-1.575 3.65-4.275 6.35-2.7 2.7-6.35 4.275Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.95Q41 31.1 41 24q0-3.05-1.05-5.85T37 13.05L13.05 37q2.25 1.95 5.075 2.975Q20.95 41 24 41Zm-12.95-6.05 23.9-23.9q-2.3-1.95-5.1-3T24 7q-7.1 0-12.05 4.95Q7 16.9 7 24q0 3.05 1.1 5.875t2.95 5.075Z"/>';
            break;
        case "warning":
            BGColor = "#fce903";
            FontColor = "#fff";
            Draw = '<path d="M24 34q.7 0 1.175-.475.475-.475.475-1.175 0-.7-.475-1.175Q24.7 30.7 24 30.7q-.7 0-1.175.475-.475.475-.475 1.175 0 .7.475 1.175Q23.3 34 24 34Zm-1.35-7.65h3V13.7h-3ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 23.95q0-4.1 1.575-7.75 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24.05 4q4.1 0 7.75 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm.05-3q7.05 0 12-4.975T41 23.95q0-7.05-4.95-12T24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24.05 41ZM24 24Z"/>';
            break;
        case "info":
            BGColor = "#145075";
            FontColor = "#fff";
            Draw = '<path d="M4 34V6.1q0-.7.65-1.4T6 4h25.95q.75 0 1.4.675Q34 5.35 34 6.1v17.8q0 .7-.65 1.4t-1.4.7H12Zm10.05 2q-.7 0-1.375-.7T12 33.9V29h25V12h5q.7 0 1.35.7.65.7.65 1.45v29.8L36.05 36ZM31 7H7v19.75L10.75 23H31ZM7 7v19.75Z"/>';
            break;
        case "log":
            BGColor = "#fff";
            FontColor = "#333";
            Draw = '<path d="M15.3 21.85q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575Q13.3 19 13.3 19.85q0 .85.575 1.425.575.575 1.425.575Zm8.85 0q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575-.575.575-.575 1.425 0 .85.575 1.425.575.575 1.425.575Zm8.5 0q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575-.575.575-.575 1.425 0 .85.575 1.425.575.575 1.425.575ZM4 44V7q0-1.15.9-2.075Q5.8 4 7 4h34q1.15 0 2.075.925Q44 5.85 44 7v26q0 1.15-.925 2.075Q42.15 36 41 36H12Zm3-7.25L10.75 33H41V7H7ZM7 7v29.75Z"/>';
            break;
        default:
            BGColor = "#fff";
            FontColor = "#333";
            Draw = '<path d="M15.3 21.85q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575Q13.3 19 13.3 19.85q0 .85.575 1.425.575.575 1.425.575Zm8.85 0q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575-.575.575-.575 1.425 0 .85.575 1.425.575.575 1.425.575Zm8.5 0q.85 0 1.425-.575.575-.575.575-1.425 0-.85-.575-1.425-.575-.575-1.425-.575-.85 0-1.425.575-.575.575-.575 1.425 0 .85.575 1.425.575.575 1.425.575ZM4 44V7q0-1.15.9-2.075Q5.8 4 7 4h34q1.15 0 2.075.925Q44 5.85 44 7v26q0 1.15-.925 2.075Q42.15 36 41 36H12Zm3-7.25L10.75 33H41V7H7ZM7 7v29.75Z"/>';
            break;
    }

    switch (posicion.toLowerCase()) {
        case "rt":
            animationInName = "ITagAnimationINRIGTH";
            animationOutName = "ITagAnimationOUTRIGTH";
            defaultPosision = "top: 20px; right:20px;";
            break;
        case "rb":
            animationInName = "ITagAnimationINRIGTH";
            animationOutName = "ITagAnimationOUTRIGTH";
            defaultPosision = "bottom: 20px; right:20px;";
            break;
        case "rm":
            animationInName = "ITagAnimationINRIGTH";
            animationOutName = "ITagAnimationOUTRIGTH";
            defaultPosision = "top: calc(50% - 35px); right:20px;";
            break;
        case "mt":
            animationInName = "ITagAnimationINUP";
            animationOutName = "ITagAnimationOUTUP";
            defaultPosision = "top:20px; left: calc(50% - 150px);";
            break;
        case "mb":
            animationInName = "ITagAnimationINDOWN";
            animationOutName = "ITagAnimationOUTDOWN";
            defaultPosision = "bottom:20px; left: calc(50% - 150px)";
            break;

        default:
            animationInName = "ITagAnimationINRIGTH";
            animationOutName = "ITagAnimationOUTRIGTH";
            defaultPosision = "bottom: 20px; rigth:20px;";
            break;
    }

    let ITag = `<div id="ITag-${IDInsatance}" style="position: fixed; width: 300px; height: 70px; background-color: ${BGColor}; display: grid; grid-template-columns: 20% 80%; grid-template-rows: 50% 50%; overflow: hidden; border-radius: 5px; box-shadow: 5px 6px 3px 3px rgb(0 0 0 / 25%); user-select: none; z-index: 9999;font-size: 16px; color: ${FontColor}; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; animation: 1s ${animationInName} linear forwards; ${defaultPosision}">
    <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"  style="grid-column: 1; grid-row: 1/3; position: relative; margin: auto; fill: ${FontColor};">
    ${Draw}</svg><h4  style="grid-column: 2; grid-row: 1; position: relative; margin: auto; margin-left: 10px; font-size: 1.5em; width: 95%; height: 75%; overflow: hidden;">${titulo}</h4>
    <h6 style="grid-column: 2; grid-row: 2; position: relative; margin: auto; margin-left: 10px; width: 95%; height: 80%; overflow: hidden;">${descripcion}</h6>
    <button onclick="ITag_Close(${IDInsatance},'${animationOutName}')" class="ITag_btn"style="position: absolute; top: -1px; right: 4px; background-color: transparent; border: none;fill: ${FontColor}; padding: 0; margin: 0; width: 10px; height: 10px;">
    <svg xmlns="http://www.w3.org/2000/svg" height="9.6" width="9.6"><path d="M2.5,7.5L2.1,7.1l2.3-2.3L2.1,2.5l0.4-0.4l2.3,2.3l2.3-2.3l0.4,0.4L5.2,4.8l2.3,2.3L7.1,7.5L4.8,5.2L2.5,7.5z" />
    </svg></button><div id="ITProgesBarr-${IDInsatance}" style="position: absolute; bottom: -1px; left: 0; width: 100%; height: 4px; border-radius: 0 0 3px 3px; background: rgba(0, 0, 0, 0.3);"></div>
    </div>`;
    let Body = `<style id="ITStile-${IDInsatance}">.ITag_btn:hover {fill: #888888 !important;}@keyframes ITagAnimationINUP {0% {top: -320px;}100% {top: 20px;}}@keyframes ITagAnimationINRIGTH {0% {right: -320px;}100% {right: 20px;}}@keyframes ITagAnimationOUTUP {0% {top: 20px;}100% {top: -320px;}}@keyframes ITagAnimationOUTRIGTH {0% {right: 20px;}100% {right: -320px;}}@keyframes ITagAnimationINDOWN {0% {bottom: -320px;}100% {bottom: 20px;}}@keyframes ITagAnimationOUTDOWN {0% {bottom: 20px;}100% {bottom: -320px;}}@keyframes ITagAnimationProgressBar {0% {width: 100%;}100% {width: 0%;}}</style>`
    document.body.innerHTML += Body;
    document.body.innerHTML += ITag;
    let Tag = document.getElementById(`ITag-${IDInsatance}`);
    let ProgBar = document.getElementById(`ITProgesBarr-${IDInsatance}`);
    Tag.addEventListener("animationend", (event) =>{
        if (event.animationName.includes("ITagAnimationIN")){
            ProgBar.style.animation = `${duracion}s ITagAnimationProgressBar linear forwards`;
        }else{
            document.body.removeChild(Tag)
            document.body.removeChild(document.getElementById(`ITStile-${IDInsatance}`))
        }
    })
    ProgBar.addEventListener("animationend", (event) => {
        Tag.style.animation = `1.5s ${animationOutName} linear forwards`;
    })
    
    
}
function ITag_Close(IDInsatance, animationOutName) {
    document.getElementById(`ITag-${IDInsatance}`).style.animation = `1.5s ${animationOutName} linear forwards`;

}