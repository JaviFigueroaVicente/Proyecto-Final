<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d3a1f4d582.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Cormorant+Garamond?sort=popularity&subset=latin-ext&noto.lang=cs_Latn">
    <title>Registrarse</title>
</head>
<body class="layoutRegistro">
    <header class="headerLogin">
        <?php
            include("header.php");
        ?>
    </header>
    <section class="LinkRegistro">
        <form action="registro_bbdd.php" enctype="multipart/form-data" id="FormRegistro" method="POST">
            <fieldset>
                <h2>Registro</h2>
                <h3>Datos Personales</h3>
                <div id="RegistroNombre">
                    <div class="Obligatorio">
                        <label for="Usuario">Nombre de usuario: <span>*</span></label>
                        <input id="Usuario" name="Usuario" type="text" placeholder="Usuario" required pattern="[a-zA-Z'-]{128}">
                        <span id="spanUsuario"></span>
                    </div>
                    <div class="Obligatorio">
                        <label for="nombre">Nombre: <span>*</span></label>
                        <input id="nombre" name="nombre" type="text" placeholder="Nombre" required pattern="[a-zA-Z'-]{3,64}">
                        <span id="spanNombre"></span>
                    </div>
                </div>
                <div id="RegistroApellidos">
                    <div class="Obligatorio">
                        <label for="Apellido">Primer Apellido: <span>*</span></label>
                        <input id="Apellido" name="Apellido" type="text" placeholder="Apellidos" required pattern="[a-zA-Z'-]{128}">
                        <span id="spanApellido"></span>
                    </div>
                    <div>
                        <label for="apellido2">Segundo Apellido: </label>
                        <input id="apellido2" name="apellido2" type="text" placeholder="Apellidos" pattern="[a-zA-Z'-]{128}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <h3>Correo Electrónico y Contraseña</h3>
                <div id="RegistroCorreo">
                    <div class="Obligatorio">
                        <label for="correo">Correo electrónico: <span>*</span></label>
                        <input id="correo" name="correo" type="email" placeholder="E-mail" required>
                        <span id="spanCorreo"></span>
                    </div>
                    <div class="Obligatorio">
                        <label for="confcorreo">Confirmar correo electrónico: <span>*</span></label>
                        <input id="confcorreo" name="confcorreo" type="email" placeholder="Confirmar E-mail" required>
                        <span id="spanConfcorreo"></span>
                    </div>
                </div>
                <div id="RegistroContra">
                    <div class="Obligatorio">
                        <label for="Contrasena">Contraseña: <span>*</span></label>
                        <input id="Contrasena" name="Contrasena" type="password" placeholder="Contraseña" required pattern="[a-zA-Z'-*-_-/-]{8,128}">
                        <span id="spanContra"></span>
                    </div>
                    <div class="Obligatorio">
                        <label for="ConfContrasena">Confirmar contraseña: <span>*</span></label>
                        <input id="ConfContrasena" name="ConfContrasena" type="password" placeholder="Confirmar Contraseña" required pattern="[a-zA-Z'-*-_-/-]{8,128}">
                        <span id="spanConfContra"></span>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <h2>Foto de Perfil</h2>
                <div id="AñadirFoto">
                    <label>Añadir Foto de Perfil:</label>
                    <input type="file" name="fotoPerfil" id="fotoPerfil">
                </div>
            </fieldset>
            <fieldset id="Registrarse">
                <div id="Boton">
                    <input id="registrar" class="submit" type="submit" value="REGISTRARSE">
                </div>
                <div id="aqui">
                    <p>Si ya tienes cuenta puedes accader a tu cuenta directamente desde </p> 
                    <a href="login.php">AQUÍ</a>
                </div>
            </fieldset>
        </form>
    </section>
    <footer class="footerLogin">
        <?php
            include ("footer.php");
        ?> 
    </footer>      
    <script src="js/erroresRegistro.js"></script>
</body>
</html>