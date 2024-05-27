<?php
include("Conexion_MongoDB.php");
require("protection.php");

if (isset($_POST["texto"], $_POST["ubicacion"])) {
    $texto=$_POST["texto"];
    $ubi=$_POST["ubicacion"];
    $usuarioPubli=$_SESSION['usuari_nom'];
    $likes=0;
    $likesUsuarios=[];
    
  

    if ((($_FILES["fotoPubli"]["type"] == "image/webp")) && ($_FILES["fotoPubli"]["size"] < 3000000)){ // Comprobamos si se ha subido un archivo
        $archivoPubli = $_FILES['fotoPubli']['name'];
        // Generar una ruta única para la imagen
        $rutaPubli = 'img/fotosPubli/' . date('d_m_Y_H_i_s') . '_' . $usuarioPubli . '_' . $archivoPubli;
        // Mover la imagen al directorio deseado
        $resultadoPubli = move_uploaded_file($_FILES["fotoPubli"]["tmp_name"], $rutaPubli);  //Movemos archivo a la ruta especificada
    }else{
        $rutaPubli='img\fotosPubli\Foto_predeterminada.webp';
    }

    $insertPubli = $publicaciones->insertOne([
        "texto" => $texto,
        "ubicacion" => $ubi,
        "fotoPubli" => $rutaPubli,
        "usuarioPubli" => $_SESSION['usuari_nom'],
        "likes" => $likes,
        "likesUsuarios"=> $likesUsuarios,
        "hora" => date('d/m/Y H:i:s')
    ]);
    

    if ($insertPubli) {
        header("Location: index.php");
        exit;
    }
}
?>
