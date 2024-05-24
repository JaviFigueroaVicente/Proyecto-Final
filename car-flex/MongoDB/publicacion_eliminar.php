<?php

use MongoDB\Operation\DeleteOne;

    include("Conexion_MongoDB.php");

    if(isset($_POST['_id_publi'])){
        $_id_Publi=$_POST["_id_publi"];

        $eliminarPubli=$publicaciones->deleteOne(
            ['fotoPubli' => $_id_Publi]   
        );
        unlink($_id_Publi);
    }
    header("location:perfil.php");
?>
