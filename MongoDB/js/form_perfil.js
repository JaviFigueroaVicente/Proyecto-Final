const guardar=document.getElementById('guardar');

guardar.addEventListener('click', save);

function save(){
    let confirmar = confirm("Confirmar cambios?");
    if (confirmar) {
        document.getElementById('EditarPerfil').submit();
    }
}