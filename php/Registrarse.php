<?php
require 'conexion.php';
include 'encriptado.php';

$Nombre =$_POST['Up_Nombre'];
$Apellido=$_POST['Up_Apellido'];
$Correo=$_POST['Up_Correo'];
$Area=$_POST['Up_Area'];

$Buscar="SELECT * FROM usuario where correo = '$Correo'";
$consulta=pg_query($conexion,$Buscar);

if(pg_num_rows($consulta)==0){
    echo 1;
    $ContrasenaDes=$_POST['Up_Contrasena'];
    $Contraseña=$encriptar($ContrasenaDes);
    $insertar="INSERT INTO public.usuario( nombre, apellido, correo, contrasena, id_area)VALUES ( '$Nombre', '$Apellido', '$Correo', '$Contraseña', $Area);";
    pg_query($conexion,$insertar);
}else{
    echo 2;
}


?>