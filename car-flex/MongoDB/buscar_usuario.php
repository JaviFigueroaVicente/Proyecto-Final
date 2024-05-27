<?php
include("Conexion_MongoDB.php");


$buscarUsuarios = isset($_POST['form_busqueda']) ? $_POST['form_busqueda'] : '';
$publicacionesUsuarios = $publicaciones->find(['usuarioPubli' => $buscarUsuarios],['sort'=>['hora'=>-1]]);

if($_POST['form_busqueda']===""){
    $publicacionesUsuarios = $publicaciones->find([],['sort'=>['hora'=>-1]]);
}
foreach ($publicacionesUsuarios as $publicacion) {
    $textoPubli = $publicacion["texto"];
    $FotoPubli = $publicacion["fotoPubli"];
    $likes = intval($publicacion["likes"]);
    $tiempo = $publicacion["hora"];
    $ubi = $publicacion["ubicacion"];
    $UsuarioPubli = $publicacion["usuarioPubli"];

    // Obtener la foto de perfil del usuario
    $perfilUsuario = $coleccion->findOne(['Usuario' => $UsuarioPubli]);
    $FotoPerfil = $perfilUsuario["fotoPerfil"];

    echo '<div class="Publicación">
        <div id="headerPubliInicio">
            <a href=""><img src="'.$FotoPerfil.'" alt="FotoUsuario"></a>
            <div id="usuario">
                <a href="">'.$UsuarioPubli.'</a>
                <p>'.$ubi.'</p>
            </div>
        </div>
        <div id="FotoPubli">
            <img src="'.$FotoPubli.'" alt="FotoPublicada">
        </div>
        <div id="FooterPubli">
            <div class="BotonesPubli" id="TxtPubli">
                <div id="DescripPubli">
                    <a href="">'.$UsuarioPubli.'</a>
                    <p>'.$textoPubli.'</p>
                </div>
                <div id="DescripLikesPerfil">                
                    <form action="likes.php" method="post">
                        <input type="hidden" name="_id" id="_id" value="'.$FotoPubli.'">
                        <input type="hidden" name="n_likes" id="n_likes" value="'.$likes.'">
                        <button type="submit" name="likes" id="likes"><i class="fa-regular fa-thumbs-up"></i></button>                  
                    </form>
                    <p>'.$likes.' likes</p>                                      
                </div>
            </div>
        </div>
    </div>';
}
?>