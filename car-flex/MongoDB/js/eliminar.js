const eliminarPubli = document.getElementById('eliminar');

    eliminarPubli.addEventListener('click', borrar);

    function borrar() {
        let confirmar = confirm("¿Estás seguro que deseas eliminar la publicación?");
        if (confirmar) {
            document.getElementById('eliminarPubli').submit();
        }
    }
