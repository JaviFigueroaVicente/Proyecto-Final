<?php
include("Conexion_MongoDB.php");
include("protection.php");

if (isset($_POST['n_likes'], $_POST['_id'])) {
    $n_likes = intval($_POST['n_likes']);
    $id = $_POST['_id'];
    $usuario=$_SESSION['usuari_nom'];

    $id_actu = ['fotoPubli' => $id];
    
    $likesUsuarios=$publicaciones->find($id_actu,['likesUsuarios']);

    // Intentar quitar el like del usuario
    $pullResult = $publicaciones->updateOne(
        $id_actu,
        ['$pull' => ['likesUsuarios' => $usuario]]
    );

    if ($pullResult->getModifiedCount() > 0) {
        // El usuario ya había dado like y fue eliminado
        $actu_likes = --$n_likes;
    }else{
        $actu_likes = ++$n_likes;
        $añadirUsuario=$publicaciones->updateOne($id_actu,['$addToSet'=>['likesUsuarios'=>$usuario]]);
    }
// Actualizar en la base de datos
$añadirLikes = $publicaciones->updateOne(
    $id_actu,
    ['$set' => ['likes' => $actu_likes]]
);
}
header("location:index.php");
?>