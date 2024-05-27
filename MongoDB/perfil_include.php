<?php
include("Conexion_MongoDB.php");

// Obtener las últimas 5 publicaciones del usuario
$publicacionesUsuario = $publicaciones->find(["usuarioPubli" => $_SESSION['usuari_nom']],['sort'=>['hora'=>-1]]);

foreach ($publicacionesUsuario as $publicacion) {
    $_id_Publi=$publicacion["_id"];
    $textoPubli = $publicacion["texto"];
    $FotoPubli = $publicacion["fotoPubli"];
    $likes = $publicacion["likes"];
    $tiempo = $publicacion["hora"];
    $ubi = $publicacion["ubicacion"];
    // Obtener la foto de perfil del usuario
    $perfilUsuario = $coleccion->findOne(["Usuario" => $_SESSION['usuari_nom']]);
    $FotoPerfil = $perfilUsuario["fotoPerfil"];

    // Obtener el nombre de usuario de la publicación actual
    $UsuarioPubli = $publicacion["usuarioPubli"];

    echo '<div class="MiPublicación">
            <div id="headerPubli">
                <div id="fotoUsuario">
                    <img src="'.$FotoPerfil.'" alt="FotoUsuario">
                    <div>
                        <a href="">'.$UsuarioPubli.'</a>
                        <p>'.$ubi.'</p>
                    </div>
                </div>
                <div>
                    <form action="publicacion_modificar.php" id="editarPubli" method="post">
                        <input type="hidden" name="_id_publi" id="_id_publi" value="'.$FotoPubli.'">
                        <button type="sumbit">Editar<i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="publicacion_eliminar.php" id="eliminar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_id_publi" id="_id_publi" value="'. $FotoPubli .'">
                        <button type="button" id="eliminarPubli">Eliminar<i class="fa-solid fa-trash"></i></button>
                    </form>
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