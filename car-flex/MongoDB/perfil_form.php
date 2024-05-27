<?php
include("Conexion_MongoDB.php");

$usuario=$coleccion->findOne(["Usuario" => $_SESSION['usuari_nom']]);

$nombre=$usuario["nombre"];
$Apellido=$usuario["Apellido"];
$apellido2=$usuario["apellido2"];
$correo=$usuario["correo"];
$Contrasena=$usuario["Contrasena"];
$_id=$usuario["_id"];


echo '<form action="perfil_modificar.php" method="post" enctype="multipart/form-data" id="EditarPerfil">
    <fieldset>
        <h2>Datos Personales</h2>
        <div>
            <label for="NuevaFoto">Cambiar Foto de Perfil</label>
            <input type="file" alt="foto_perfil" id="NuevaFoto" name="NuevaFoto"><img src="' . $FotoPerfil . '" ></input>
        </div>
        <div>
            <label for="NuevoUsuario">Cambiar Usuario</label>
            <input required type="text" id="NuevoUsuario" name="NuevoUsuario" placeholder="Escribe tu nuevo usuario" value="' . $_SESSION['usuari_nom'] . '">
        </div>
        <div>
            <label for="NuevoNombre">Cambiar Nombre</label>
            <input required type="text" name="NuevoNombre" id="NuevoNombre" placeholder="Nuevos Nombre" value="' . $nombre . '">
        </div>
        <div>
            <label for="NuevoApellido1">Cambiar Apellidos</label>
            <input required type="text" name="NuevoApellido1" id="NuevoApellido1" placeholder="Nuevo Primer Apellido" value="' . $Apellido . '">
            <input type="text" name="NuevoApellido2" id="NuevoApellido2" placeholder="Nuevo Segundo Apellido" value="' . $apellido2 . '">
        </div>
        <div>
            <label for="Correo">Cambiar Correo Electrónico</label>
            <input required type="email" name="NuevoCorreo" id="NuevoCorreo" placeholder="Nuevo Correo Eléctronico" value="' . $correo . '">
            <input type="email" name="ConfNuevoCorreo" id="ConfNuevoCorreo" placeholder="Confirmar Nuevo Correo Eléctronico">
        </div>
        <div id="PerfilBottom">
            <label for="NuevaContraseña">Cambiar Contraseña</label>
            <input required type="password" name="NuevaContraseña" id="NuevaContraseña" placeholder="Nueva Contraseña" pattern="[a-zA-Z-*-_-/-]{8,128}" value="' . $Contrasena . '">
            <input type="password" name="ConfNuevaContraseña" id="ConfNuevaContraseña" placeholder="Confirmar Nueva Contraseña" pattern="[a-zA-Z-*-_-/-]{8,128}">
        </div>
            <input type="hidden" name="_id" id="_id" value="'.$_id.'">
            <input type="hidden" name="foto_perfil" id="foto_perfil" value="'.$FotoPerfil.'">
        <div id="Guardar">
            <button id="guardar" class="submit" type="button">Guardar</button>
        </div>
    </fieldset>
</form>';

?>

