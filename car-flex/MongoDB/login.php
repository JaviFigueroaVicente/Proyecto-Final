<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d3a1f4d582.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Cormorant+Garamond?sort=popularity&subset=latin-ext&noto.lang=cs_Latn">
    <title>Car Flex</title>
</head>
<body class="layoutLogin">
    <header class="headerLogin">
        <?php
            include("header.php");
        ?>
    </header>
    <section class="Login">
        <form action="Car_Flex_php.php" id="FormLogin" method="POST">
            <fieldset>
                <div id="LetrasLogin">
                    <a href="index.php"><img src="img/Logo_Car_Flex.webp" alt="Logo"></a>
                    <p>Login</p>
                </div>
                <div id="DatosLogin">
                    <div class="Obligatorio">
                        <label for="Usuario">Nombre de usuario: </label>
                        <input name="usuario_login" id="usuario_login" type="text" placeholder="Nombre de usuario" required pattern="[a-zA-Z'-]{3,64}">
                        <span id="span"></span>
                    </div>
                    <div class="Obligatorio">
                        <label for="Contraseña">Contraseña: </label>
                        <input name="contra_login" id="contra_login" type="password" placeholder="Contraseña" required pattern="[a-zA-Z'-*-_-/-]]{8,128}">
                        <span id="span"></span>
                    </div>
                </div>
                <div class="Entrar">
                    <button id="entrar" type="submit">ENTRAR</button>
                </div>
                <div id="LinkRegistro">
                    <p>¿Aún no tienes cuenta?<a href="registre.php">REGISTRATE AQUÍ</a></p>
                </div>
            </fieldset>
        </form>
    </section>
    <footer class="footerLogin">
        <?php
            include ("footer.php");
        ?> 
    </footer>      
</body>
</html>