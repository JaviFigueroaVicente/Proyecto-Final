const publicar=document.getElementById('publicar');

publicar.addEventListener('submit', function(event) {
    const texto = document.getElementById('texto').value;
    const spanTexto = document.getElementById('spanTexto');
    const fotoPubli = document.getElementById('fotoPubli');
    const spanFoto = document.getElementById('spanFoto');

    // Inicializar variable para controlar si el formulario es válido
    let ValidarForm = true;

    if (texto === "") {
        spanTexto.textContent = "Introduce un comentario";
        ValidarForm = false;
    } else {
        spanTexto.textContent = ""; // Limpiar el mensaje de error si el campo de texto no está vacío
    }

    if (fotoPubli.files.length === 0) {
        spanFoto.textContent = "Añade una foto";
        ValidarForm = false;
    } else {
        spanFoto.textContent = ""; // Limpiar el mensaje de error si se ha seleccionado una foto
    }

    // Si algún campo no es válido, prevenir el envío del formulario
    if (!ValidarForm) {
        event.preventDefault();
    }
});
