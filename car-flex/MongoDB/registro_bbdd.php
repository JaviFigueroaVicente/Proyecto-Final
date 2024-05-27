<?php
// Incluir el archivo de conexión a MongoDB
include("Conexion_MongoDB.php");


// Verificar si se enviaron todos los datos necesarios por POST
if (isset($_POST["Usuario"], $_POST["nombre"], $_POST["Apellido"], $_POST["correo"], $_POST["Contrasena"])) {
    // Obtener los datos del formulario
    $usuario = $_POST["Usuario"];
    $nombre = $_POST["nombre"];
    $Apellido = $_POST["Apellido"];
    $apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : ""; // Verificar si se proporcionó el segundo apellido
    $correo = $_POST["correo"];
    $confcorreo = $_POST["confcorreo"];
    $Contrasena = $_POST["Contrasena"];
    $ConfContrasena = $_POST["ConfContrasena"];

    // Validar que los campos de contraseña coincidan
    if ($Contrasena !== $ConfContrasena) {
        echo"<script>
        alert('Las contraseñas no coinciden');
        window.location='registre.'php';
        </script>";
       exit;
    }

    // Validar correo electrónico
    if ($correo !== $confcorreo) {
        echo"<script>
        alert('Los correos no coinciden');
        window.location='registre.php';
        </script>";
        exit;
    }

     
    // Verificar si el usuario o correo ya existen
    $usuarioExist = $coleccion->findOne(["Usuario" => $usuario]);
    $correoExist = $coleccion->findOne(["correo" => $correo]);
    if($usuarioExist){
        echo"<script>
        alert('El usuario ya existe');
        window.location='registre.php';
        </script>";
        
        exit;
    }   
    if($correoExist){
        echo"<script>
        alert('El correo ya existe');
        window.location='registre.php';
        </script>";
        
        exit;
    }


    // Procesar la imagen si se ha subido
    if ((($_FILES["fotoPerfil"]["type"] == "image/webp")) && ($_FILES["fotoPerfil"]["size"] < 3000000)){ // Comprobamos si se ha subido un archivo
        $archivo = $_FILES['fotoPerfil']['name'];
        // Generar una ruta única para la imagen
        $rutaPerfil = 'img/fotosPerfil/' . time() . '_' . $usuario . '_' . $archivo;
        // Mover la imagen al directorio deseado
        $resultado = move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $rutaPerfil);  //Movemos archivo a la ruta especificada
    }else{     
        $rutaPerfil = 'img/fotosPerfil/foto_perfil.webp';  
    }

    // Insertar usuario en la base de datos
    $insertResult = $coleccion->insertOne([
        "Usuario" => $usuario,
        "nombre" => $nombre,
        "Apellido" => $Apellido,
        "apellido2" => $apellido2 ?: null, // Si no se proporciona el segundo apellido, dejarlo como null
        "correo" => $correo,
        "Contrasena" => $Contrasena, // Almacenar la contraseña sin cifrar
        "fotoPerfil" => $rutaPerfil
    ]);

    if ($insertResult) {
        header("Location: login.php");
        exit; // Terminar el script después de redireccionar
    }
}
?>