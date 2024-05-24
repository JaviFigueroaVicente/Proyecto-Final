<?php
 include("protection.php");
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
        <?php
            include("header.php");
        ?>
    </header>
    <section class="MenuIzquierda">
        <?php
            include("menu_lateral.php");
        ?>
    </section> 
    <section class="Publicaciones">
        <?php
            include("index_include.php");
        ?>
    </section>   
    <footer class="footer">
        <?php
            include ("footer.php");
        ?> 
    </footer>  
</body>            
</html>
