previsualizar.addEventListener('click',ModPre);

const Modtexto=document.getElementById('textoModificado');
const Modubi=document.getElementById('ubiModificada');

function ModPre(){
    const textoPre=document.getElementById('textoPre');
    const ubiPre=document.getElementById('ubicacionPre');
    ubiPre.textContent=Modubi.value;
    textoPre.textContent=Modtexto.value;
}

