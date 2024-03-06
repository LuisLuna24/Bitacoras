<?php
//Actualizar equipo en sección inventario de equipo 

require "../../php/conexion.php";
session_start();

//Obtener datos nuevos para actualizar equipo
$Inventario=$_POST['Inventario_Equipo'];
$Descripcion=$_POST['Descripcion_Equipo'];
$Nombre=$_POST['Nombre_Equipo'];
$Area=$_POST['Area_Equipo'];
$Estado=$_POST['Estado_Equipo'];
$Id_equipo=$_SESSION['Equipo'];

//Busacar version Maxima
$Buscarmax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo = '$Id_equipo' ";
$querymax=pg_query($conexion,$Buscarmax);
$rowmax=pg_fetch_assoc($querymax);
$version_max=$rowmax['max']+1;

$Actualizar="INSERT INTO public.equipo(
    id_equipo, vercion_equipo, identificador, nombre, descripcion, id_area, estado_equipo)
    VALUES ('$Inventario', '$version_max', '$Inventario - GISENA','$Nombre', '$Descripcion', '$Area', '$Estado');";
pg_query($conexion,$Actualizar);
echo 1;

?>