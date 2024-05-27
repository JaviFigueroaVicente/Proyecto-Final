<?php
include("Conexion_MongoDB.php");

    echo'<nav>
    <ul>
        <li><a href="perfil.php"><p>'.$_SESSION['usuari_nom'].'</p></a></li>
        <li><a href="publicar.php"><i class="fa-solid fa-upload"></i>Publicar</a></li>
        <li><a href="index.php?filtro=tendencias"><i class="fa-solid fa-fire"></i>Tendencias</a></li>
        <li><a href="index.php?filtro=recientes"><i class="fa-regular fa-clock"></i>Más Recientes</a></li>
        <li><a href="index.php?filtro=gustados"><i class="fa-solid fa-heart"></i>Más Gustados</a></li>                    
    </ul>
</nav>';
?>