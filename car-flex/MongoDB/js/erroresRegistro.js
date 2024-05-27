const registro = document.getElementById('registrar');

registro.addEventListener('click', registrar);

function registrar(event) {
    event.preventDefault();

    const usuario = document.getElementById('Usuario').value;
    const apellido = document.getElementById('Apellido').value;
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const confcorreo = document.getElementById('confcorreo').value;
    const contra = document.getElementById('Contrasena').value;
    const confcontra = document.getElementById('ConfContrasena').value;

    const spanUsuario = document.getElementById('spanUsuario');
    const spanNombre = document.getElementById('spanNombre');
    const spanApellido = document.getElementById('spanApellido');
    const spanCorreo = document.getElementById('spanCorreo');
    const spanConfCorreo = document.getElementById('spanConfcorreo'); // Nota: ConfCorreo está en minúscula en el HTML
    const spanContra = document.getElementById('spanContra');
    const spanConfContra = document.getElementById('spanConfContra');

    // Inicializar variable para controlar si el formulario es válido
    let formIsValid = true;

    // Validación de usuario
    if (usuario === "") {
        spanUsuario.textContent = "Introduce un nombre de usuario válido";
        formIsValid = false;
    } else {
        spanUsuario.textContent = "";
    }

    // Validación de nombre
    if (nombre === "") {
        spanNombre.textContent = "Introduce tu nombre";
        formIsValid = false;
    } else {
        spanNombre.textContent = "";
    }

    // Validación de apellido
    if (apellido === "") {
        spanApellido.textContent = "Introduce tu primer apellido";
        formIsValid = false;
    } else {
        spanApellido.textContent = "";
    }

    // Validación de contraseñas
    if (contra === "") {
        spanContra.textContent = "Introduce una contraseña válida";
        formIsValid = false;
    } else {
        spanContra.textContent = "";
    }

    if (contra !== confcontra) {
        spanConfContra.textContent = "Las contraseñas no coinciden";
        formIsValid = false;
    } else {
        spanConfContra.textContent = "";
    }

    // Validación de correos electrónicos
    if (correo === "") {
        spanCorreo.textContent = "Introduce un correo electrónico válido";
        formIsValid = false;
    } else {
        spanCorreo.textContent = "";
    }

    if (correo !== confcorreo) {
        spanConfCorreo.textContent = "Los correos no coinciden";
        formIsValid = false;
    } else {
        spanConfCorreo.textContent = "";
    }

    // Si todos los campos son válidos, enviar el formulario
    if (formIsValid) {
        document.getElementById('FormRegistro').submit();
    }
}