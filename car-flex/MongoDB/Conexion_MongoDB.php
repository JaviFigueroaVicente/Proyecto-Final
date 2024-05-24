<?php
    require 'vendor/autoload.php'; // incluir Composer

    $cliente = new MongoDB\Client("mongodb://127.0.0.1:27017"); // Conexión
    
    $db = $cliente->CarFlex; // Base de datos
    $coleccion = $db->usuarios; // Colección
    $publicaciones = $db->publicaciones;

?>