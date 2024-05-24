const previsualizar=document.getElementById('previsualizar');

previsualizar.addEventListener('click',pre);

const texto=document.getElementById('texto');
const ubi=document.getElementById('ubicacion');

function pre(){
    const textoPre=document.getElementById('textoPre');
    const ubiPre=document.getElementById('ubicacionPre');
    ubiPre.textContent=ubi.value;
    textoPre.textContent=texto.value;
}

