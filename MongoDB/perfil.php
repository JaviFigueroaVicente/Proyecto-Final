<?php
    require("protection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d3a1f4d582.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Cormorant+Garamond?sort=popularity&subset=latin-ext&noto.lang=cs_Latn">
    <title>Mi Perfil</title>
    
</head>
<body class="layoutPerfil">
    <header class="headerLogin">
    <?php
        include("header.php");
    ?>
    </header>
    <section class="MenuPerfil">
        <?php    
            include("perfil_form.php");
        ?>
    </section>
    <section class="MisPublicaciones">
        <?php
            include("perfil_include.php");
        ?>
    </section>
    <footer class="footer">
            <?php
                include ("footer.php");
            ?> 
    </footer>  
    <script src="js/eliminar.js"></script>  
    <script src="js/form_perfil.js"></script>
</body>
</html>