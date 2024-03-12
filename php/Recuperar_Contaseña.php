<?php

require "conexion.php";
include "encriptado.php";

$Usuario=$_POST['Contraseña_Usuario'];
$Contraseñades=$_POST['Contraseña_Recuperar'];
$Contraseña=$encriptar($Contraseñades);

try{
    $Actualizar="UPDATE public.usuarios
	SET contrasena='$Contraseña' WHERE id_usuario='$Usuario';";
    pg_query($conexion,$Actualizar);
    echo 1;

}catch(Exception $e){
    echo $e;
}


?>