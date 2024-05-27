<?php
include("Conexion_MongoDB.php");

// Verificar si se han enviado datos de inicio de sesión por POST
if(isset($_POST['usuario_login'], $_POST['contra_login'])){ 
    // Obtener el nombre de usuario y la contraseña del formulario de inicio de sesión
    $nombreUsuario = $_POST['usuario_login'];
    $contrasena = $_POST['contra_login'];
    $recordar = isset($_POST['recordar']); // Verificar si el checkbox está marcado

    // Verificar si el checkbox "Recordar usuario" está marcado
    if ($recordar) {
        // Crear una cookie para recordar al usuario
        setcookie("usuario", $nombreUsuario, time() + 86400 * 30, "/"); // La cookie expirará en 30 días
    }

    // Buscar el usuario en la base de datos
    $usuari = $coleccion->findOne(["Usuario" => $nombreUsuario]);

    // Verificar si el usuario existe y si la contraseña coincide
    if($usuari && $usuari["Contrasena"] === $contrasena){
        // Iniciar una sesión
        session_start();
        // Almacenar el nombre de usuario en la sesión
        $_SESSION['usuari_nom'] = $nombreUsuario;  
        
        // Redirigir al usuario a la página index.php
        header("location:index.php");
        exit();
    } else {
        // Redirigir al usuario de vuelta a la página de inicio de sesión si las credenciales son incorrectas
        header("location:login.php"); 
        exit();
    }
}
?>