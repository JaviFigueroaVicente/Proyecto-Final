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
    
    <title>Publicar</title>
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
    <section class="SubirPubli">
        <form id="publicar" class="publicar" action="publicar_MongoDB.php" enctype="multipart/form-data" method="POST">
            <fieldset>
                <h2>Publicar</h2>
                <div>
                    <div id="span">
                        <label for="texto">¿Qué quieres comentar?</label>
                        <span>*</span>
                    </div>
                    <input required id="texto" name="texto" type="text" placeholder="¿En qué estás pensando?" maxlength="300">
                    <span id="spanTexto"></span>
                </div>
                <div>
                    <label for="ubicacion">¿Dónde está situada la foto?</label>
                    <input id="ubicacion" name="ubicacion" placeholder="Ubicación" type="text">
                </div>
                <div>
                    <div id="span">
                        <label for="foto">Añade la foto</label>
                        <span>*</span>
                    </div>
                    <input required type="file" name="fotoPubli" id="fotoPubli">
                    <span id="spanFoto"></span>
                </div>
                <div id="previsualizarButton">
                    <input type="button" id="previsualizar" value="Previsualizar">
                </div>
                <div id="submitPublicar">
                    <input type="submit" value="PUBLICAR" id="submit" class="submit">
                </div>
            </fieldset>
        </form>
        <div id="publicarPre">
            <?php
                include("publicar_pre.php");
            ?>
        </div>
    </section>
    <footer class="footer">
        <?php
            include ("footer.php");
        ?> 
    </footer>  
</body>
<script src="js/errores.js"></script>
<script src="js/publicacion_pre.js"></script>
</html>