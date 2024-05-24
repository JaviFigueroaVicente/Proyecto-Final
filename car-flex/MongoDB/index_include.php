<?php
include("Conexion_MongoDB.php");

/*$buscador="";
if(isset($_POST["buscador"])){
    $buscador=$_POST["buscador"];
}*/
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'recientes';

if ($filtro=='tendencias'){
    $publicacionesUsuarios = $publicaciones->find([], ['sort' => ['likes' => -1, 'hora' => -1]]);
}else if($filtro=='gustados'){
    $publicacionesUsuarios= $publicaciones->find([],['sort'=> ['likes'=>-1]]);
}else{
    $publicacionesUsuarios = $publicaciones->find([],['sort'=>['hora'=>-1]]);
}

include("publicacion.php");
?>