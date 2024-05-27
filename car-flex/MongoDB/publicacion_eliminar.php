<?php
    include("Conexion_MongoDB.php");
    $fotoPredeterminada='img\fotosPubli\Foto_predeterminada.webp';

    if(isset($_POST['_id_publi'])){
        $_id_Publi=$_POST["_id_publi"];

        $eliminarPubli=$publicaciones->deleteOne(
            ['fotoPubli' => $_id_Publi]   
        );
        if($_id_Publi!=$fotoPredeterminada){
            unlink($_id_Publi);
            }
    }
    header("location:perfil.php");
?>
