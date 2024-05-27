const enviar = document.getElementById('submit');

enviar.addEventListener('click', noEnviar);

function noEnviar(event) {
    event.preventDefault(); // Evita el envío predeterminado del formulario

    const texto = document.getElementById('texto').value; // Obtener el valor del campo de texto
    const spanTexto = document.getElementById('spanTexto');
    const fotoPubli= document.getElementById('fotoPubli');
    const spanFoto=document.getElementById('spanFoto');

    if (texto === "") {
        spanTexto.textContent = "Introduce un comentario";
    } else {
        spanTexto.textContent = ""; // Limpiar el mensaje de error si el campo de texto no está vacío
    }

    if (fotoPubli.files.length === 0) {
        spanFoto.textContent = "Añade una foto";
    } else {
        spanFoto.textContent = ""; // Limpiar el mensaje de error si se ha seleccionado una foto
    }
}

