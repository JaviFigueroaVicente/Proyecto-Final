<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include("Conexion_MongoDB.php");

    if(!isset($_SESSION['usuari_nom'])){
    echo'<section id="MenuLogin">
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
    </section>';
    }else{ 
    //filtro de búsqueda
    
    $perfilUsuario = $coleccion->findOne(["Usuario" => $_SESSION['usuari_nom']]);
    $FotoPerfil = $perfilUsuario["fotoPerfil"];      
    echo '<section id="MenuLogin">
    <div>
        <a href="index.php"><img src="img/Logo_Car_Flex.webp" alt="Logo">
        <h1>Car Flex</h1></a>
    </div>
    <div>
        <form action="" id="busqueda" method="get">
            <label for="busqueda"><input type="text" placeholder="Que quieres buscar?" id="form_busqueda" name="form_busqueda">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <nav id="MenuPrincipal">
        <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
            <li><a href="perfil.php">Perfil</a></li>
        </ul>
        <a href="perfil.php"><img id="FotoPerfil" src="'.$FotoPerfil.'" alt="FotoPerfil"></a>
    </nav>
</section>';
    }
    $busqueda = isset($_GET['form_busqueda']) ? $_GET['form_busqueda'] : "";

    // Si hay un término de búsqueda, filtrar por usuarioPubli
    if (!empty($busqueda)) {
        $publicacionesUsuarios = $publicaciones->find(['usuarioPubli' => $busqueda]);
    } else {
        // Si no hay término de búsqueda, recuperar todas las publicaciones ordenadas por hora
        $publicacionesUsuarios = $publicaciones->find([], ['sort' => ['hora' => -1]]);
    }
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'recientes';
?>
</body>

</html>
