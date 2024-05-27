<?php
include("Conexion_MongoDB.php");
    $perfilUsuario = $coleccion->findOne(["Usuario" => $_SESSION['usuari_nom']]);
    $FotoPerfil = $perfilUsuario["fotoPerfil"];
        
    echo '
        <div id="headerPre">
            <img src="'.$FotoPerfil.'" alt="FotoUsuario">
            <div id="usuarioUbi">
                <a href="">'.$_SESSION['usuari_nom'].'</a>
                <p id="ubicacionPre">Ubicación</p>
            </div>
        </div>
        <div id="FotoPre">
            <img id="fotoPre" src="img/FotosPubli/Foto_predeterminada.webp" alt="FotoPublicada"></img>
        </div>
        <div id="FooterPre">
            <div id="TxtPre">
                <div id="DescripPre">
                    <p>'.$_SESSION['usuari_nom'].'<p>
                    <p id="textoPre">Aquí va tu comentario</p>
                </div>
                <div id="DescripLikesPre">
                    <div id="BotonesPre">
                        <button id="Like"><i class="fa-regular fa-thumbs-up"></i></button>
                        <p> likes</p>
                    </div>                    
                </div>
            </div>
        </div>';
    ?>    