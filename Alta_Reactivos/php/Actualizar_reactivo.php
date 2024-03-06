<?php
require "../../php/conexion.php";
session_start();
//Actualiza los datos de los reactivos 

////Obtiene los datos nuevos de los reactivos a través del método Ajax

$id_reactivo=$_SESSION['Reactivo'];
$Reactivo=$_SESSION['Reactivo'];
$Nombre=$_POST['Reacivo_Nombre'];
$Lote=$_POST['Reactivo_Lote'];
$Descripcion=$_POST['Reactivo_Descripcion'];
$Cantidad=$_POST['Reactivo_Cantidad'];
$Fecha=$_POST['Reactivo_Caducidad'];
$fcaducidad= date("Y-m-d", strtotime($Fecha));

$Buscar="SELECT MAX(version_reactivo) As version_max, estado FROM reactivos where  id_reactivo = '$id_reactivo' GROUP BY estado;";
$querybuscra=pg_query($conexion,$Buscar);
$row=pg_fetch_assoc($querybuscra);

$version_reactivo=$row['version_max']+1;
$Estado=$row['estado'];

try{
    $Actualizar="INSERT INTO public.reactivos(
        id_reactivo, version_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote,estado)
        VALUES ('$id_reactivo', '$version_reactivo', '$Nombre', '$Descripcion', '$Cantidad', '$fcaducidad', '$Lote','$Estado');";
    $query=pg_query($conexion,$Actualizar);
    echo 1;
}catch(Exception $e){
    echo 2;
}


        
?>