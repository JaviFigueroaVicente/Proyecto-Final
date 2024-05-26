<?php
include("Conexion_MongoDB.php");
include("protection.php");

if (isset($_POST["_id"])){
        $NuevoUsuario = $_POST["NuevoUsuario"];
        $NuevoNombre = $_POST["NuevoNombre"];
        $NuevoApellido1 = $_POST["NuevoApellido1"];
        $NuevoApellido2 = $_POST["NuevoApellido2"];
        $NuevoCorreo=$_POST["NuevoCorreo"];
        $NuevaContraseña= $_POST["NuevaContraseña"];
        $fotoPerfil=$_POST["foto_perfil"];

        
        // Verificar si los campos opcionales están seteados antes de intentar acceder a ellos
        $ConfNuevoCorreo = isset($_POST["ConfNuevoCorreo"]) ? $_POST["ConfNuevoCorreo"] : null;
        $ConfNuevaContraseña = isset($_POST["ConfNuevaContraseña"]) ? $_POST["ConfNuevaContraseña"] : null;

            // Procesar la nueva foto de perfil si se ha subido
        if ((($_FILES["NuevaFoto"]["type"] == "image/webp")) && ($_FILES["NuevaFoto"]["size"])) {
            $archivo = $_FILES['NuevaFoto']['name'];
            $rutaNuevaFoto = 'img/fotosPerfil/' . time() . '_' . $NuevoUsuario . '_' . $archivo;
            $resultado = move_uploaded_file($_FILES["NuevaFoto"]["tmp_name"], $rutaNuevaFoto);
            if($fotoPerfil!='img/fotosPerfil/foto_perfil.webp'){
            unlink($fotoPerfil);
            }
        } else {
            // Si no se sube una nueva foto, mantener la foto de perfil actual
            $rutaNuevaFoto = $fotoPerfil; // Obtener la ruta de la foto de perfil actual
        }
        if($NuevoUsuario!=$_SESSION['usuari_nom']){
            $modificarPublis=$publicaciones->updateOne(
                ['usuarioPubli'=>$_SESSION['usuari_nom']],
                ['$set' => ['usuarioPubli' => $NuevoUsuario]]
            );
        }



// Actualizar el documento en MongoDB
$modificarUsuario = $coleccion->updateOne(
        ['Usuario' => $_SESSION['usuari_nom']], // Filtro para encontrar el documento
        ['$set' => [
            'Usuario' => $NuevoUsuario,
            'nombre' => $NuevoNombre,
            'Apellido' => $NuevoApellido1,
            'apellido2' => $NuevoApellido2,
            'correo' => $NuevoCorreo,
            'Contrasena' => $NuevaContraseña,
            'fotoPerfil' => $rutaNuevaFoto
        ]]
    );
}
$_SESSION['usuari_nom']=$NuevoUsuario;

header("location: perfil.php");

?>