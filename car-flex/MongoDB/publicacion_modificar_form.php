<?php
    include ("Conexion_MongoDB.php");
    require("protection.php");

    if(isset($_POST['textoModificado'],$_POST['ubiModificada'])){
        $textoModificado=$_POST['textoModificado'];
        $ubiModificada=$_POST['ubiModificada'];
        $rutaModificada=$_POST["rutaModificada"];
        $_id_Publi=$_POST["_id_publi"];
        

        if ((($_FILES["fotoModificada"]["type"] == "image/webp")) && ($_FILES["fotoModificada"]["size"])) {
            $archivo = $_FILES['fotoModificada']['name'];
            $rutafotoModificada = 'img/fotosPerfil/' . time() . '_' . $NuevoUsuario . '_' . $archivo;
            $resultado = move_uploaded_file($_FILES["fotoModificada"]["tmp_name"], $rutafotoModificada);
            unlink($rutaModificada);
        } else {
            // Si no se sube una nueva foto, mantener la foto de perfil actual
            $rutafotoModificada = $_id_Publi; // Obtener la ruta de la foto de perfil actual desde la sesión
        }

    $modificarPubli= $publicaciones->updateOne(
        ['fotoPubli'=>$_id_Publi],
        ['$set'=> [
            'texto'=>$textoModificado,
            'ubicacion'=>$ubiModificada,
            'fotoPubli'=>$rutafotoModificada,
        ]]    
    );
    }
    header("location:perfil.php");
?>

    
