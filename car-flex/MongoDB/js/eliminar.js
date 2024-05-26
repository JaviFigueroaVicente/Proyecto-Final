const eliminarPubli = document.getElementById('eliminarPubli');

    eliminarPubli.addEventListener('click', borrar);

    function borrar() {
        let confirmar = confirm("¿Estás seguro que deseas eliminar la publicación?");
        if (confirmar) {
            document.getElementById('eliminar').submit();
        }
    }
