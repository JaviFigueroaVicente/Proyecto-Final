<?php
    include("Conexion_MongoDB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d3a1f4d582.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Cormorant+Garamond?sort=popularity&subset=latin-ext&noto.lang=cs_Latn">
    <title>Inicio</title>
</head>
<body class="layout">
    <header class="headerLogin">    
        <section id="MenuLogin">
            <div>
                <a href="index.php"><img src="img/Logo_Car_Flex.webp" alt="Logo">
                <h1>Car Flex</h1></a>
            </div>
            <nav id="MenuPrincipal">
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>Inicio</a></li>
                    <li><a href="login.php">Entrar</a></li>
                    <li><a href="registre.php">Registrar</a></li>
                </ul>
            </nav>
        </section>
    </header>
    <section class="MenuIzquierda">
    <nav>
    <ul>
        <li><a href="index_sin_iniciar.php?filtro=tendencias"><i class="fa-solid fa-fire"></i>Tendencias</a></li>
        <li><a href="index_sin_iniciar.php?filtro=recientes"><i class="fa-regular fa-clock"></i>Más Recientes</a></li>
        <li><a href="index_sin_iniciar.php?filtro=gustados"><i class="fa-solid fa-heart"></i>Más Gustados</a></li>                    
    </ul>
</nav>
    </section> 
    <section class="Publicaciones">
        <?php
            $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'recientes';

            if ($filtro=='tendencias'){
                $publicacionesUsuarios = $publicaciones->find([], ['sort' => ['likes' => -1, 'hora' => -1]]);
            }else if($filtro=='gustados'){
                $publicacionesUsuarios= $publicaciones->find([],['sort'=> ['likes'=>-1]]);
            }else{
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
                $perfilUsuario = $coleccion->findOne(['Usuario'=>$UsuarioPubli]);
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
                            <a href="login.php"><button type="submit" name="likes" id="likes"><i class="fa-regular fa-thumbs-up"></i></button></a>                  
                                <p>'.$likes.' likes</p>                                      
                            </div>
                        </div>
                    </div>
                </div>';
            }
        ?>
    </section>   
    <footer class="footer">
        <?php
            include ("footer.php");
        ?> 
    </footer>  
</body>            
</html>
