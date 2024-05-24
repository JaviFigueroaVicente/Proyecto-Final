<?php
include("Conexion_MongoDB.php");

if ($filtro=='tendencias'){
    $publicacionesUsuarios = $publicaciones->find([], ['sort' => ['likes' => -1, 'hora' => -1]]);
}else if($filtro=='gustados'){
    $publicacionesUsuarios= $publicaciones->find([],['sort'=> ['likes'=>-1]]);
}else{
    $publicacionesUsuarios = $publicaciones->find([],['sort'=>['hora'=>-1]]);
}

include("publicacion.php");
?>