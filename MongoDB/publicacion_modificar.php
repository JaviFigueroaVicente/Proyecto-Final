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
    <title>Modificar publicación</title>
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
        <?php
            if(isset($_POST["_id_publi"])){
            $_id_Publi=$_POST["_id_publi"];

            
            $modificar_publi=$publicaciones->findOne(['fotoPubli'=> $_id_Publi]);

            $modificar_texto=$modificar_publi['texto'];
            $modificar_ubi=$modificar_publi['ubicacion'];
            

        echo '<form class="publicar" id="modificar" action="publicacion_modificar_form.php" enctype="multipart/form-data" method="POST">
                <fieldset>
                    <h2>Modificar publicación</h2>
                    <div>
                        <label for="textoModificado">Que quieres comentar?</label>
                        <input require id="textoModificado" name="textoModificado" type="text" placeholder="En que estás pesando..." pattern="{300}" value="'.$modificar_texto.'">
                    </div>
                    <div>
                        <label for="ubiModificada">Donde está situada la foto?</label>
                        <input require id="ubiModificada" name="ubiModificada" placeholder="Ubicación" type="text" value="'.$modificar_ubi.'" >
                    </div>
                    <div>
                        <label for="fotoModificada">Selecciona la foto</label>
                        <input require type="file" name="fotoModificada" id="fotoModificada">
                    </div>
                    <div id="previsualizarButton">
                        <input type="button" id="previsualizar" value="Previsualizar">
                    </div>
                    <input type="hidden" name="_id_publi" id="_id_publi" value="'.$_id_Publi.'">
                    <div id="submitPublicar">
                        <input type="submit" value="MODIFICAR" class="submit">
                    </div>
                </fieldset>
            </form>';
            }
        ?>
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
<script src="js/publicacion_modificar_pre.js"></script>
</html>