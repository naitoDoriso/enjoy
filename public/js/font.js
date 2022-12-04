[...document.querySelectorAll("body,body *")].map(elm=>{
    elm.style.fontSize= parseFloat(getComputedStyle(elm).fontSize.replace("px", "")) + localStorage.getItem("fontSize") + "px";
})
