window.onload = () => {
    [...document.querySelectorAll("body,body *:not(div.enabled,div.enabled *,.btn,.btn *)")].map(ole => {
        ole.style.backgroundColor = "#000";
        ole.style.color = "#fff";
    });

    let intervalo = setInterval(() => {
        [...document.querySelectorAll("body,body *:not(div.enabled,div.enabled *,.btn,.btn *)")].map(ole => {
            ole.style.backgroundColor = "#000";
            ole.style.color = "#fff";
        });
    }, 800);
}