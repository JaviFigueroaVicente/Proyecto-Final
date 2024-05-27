const previsualizar=document.getElementById('previsualizar');

previsualizar.addEventListener('click',pre);

const texto=document.getElementById('texto');
const ubi=document.getElementById('ubicacion');
const imagen=document.getElementById('fotoPubli');

function pre(){
    const textoPre=document.getElementById('textoPre');
    const ubiPre=document.getElementById('ubicacionPre');
    const fotoPre=document.getElementById('fotoPre');
    ubiPre.textContent=ubi.value;
    textoPre.textContent=texto.value;

    const fotoArchivo = imagen.files[0];
            if (fotoArchivo) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    fotoPre.src = e.target.result;
                }
                reader.readAsDataURL(fotoArchivo);
            } else {
                fotoPre.src = 'img/fotosPubli/Foto_predeterminada.webp';
            }
}

