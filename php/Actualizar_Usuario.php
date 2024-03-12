<?php
require "conexion.php";

$Id_Usuario=$_POST["Actualizar_Select"];
$Nombre=$_POST["Nombre_Actualizar"];
$Apellido=$_POST["Apellido_Actualizar"];
$Coreo=$_POST["Correo_Actualizar"];

try{
    $Actualizar="UPDATE public.usuarios SET nombre='$Nombre', apellido='$Apellido', correo='$Coreo' WHERE id_usuario='$Id_Usuario';";
    pg_query($conexion,$Actualizar);
    echo 1;

}catch(Exception $e){
    echo $e;
}


?>