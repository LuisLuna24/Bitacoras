<?php
require "../../php/conexion.php";
session_start();

$Reactivo=$_SESSION['Reactivo'];
$Nombre=$_POST['Reacivo_Nombre'];
$Lote=$_POST['Reactivo_Lote'];
$Descripcion=$_POST['Reactivo_Descripcion'];
$Cantidad=$_POST['Reactivo_Cantidad'];
$Fecha=$_POST['Reactivo_Caducidad'];
$fcaducidad= date("Y-m-d", strtotime($Fecha));

try{
    $Actualizar="UPDATE public.reactivos
        SET nombre='$Nombre', descripcion='$Descripcion', cantidad='$Cantidad', fecha_caducidad='$fcaducidad', lote='$Lote'
        WHERE id_reactivo='$Reactivo';";
    $query=pg_query($conexion,$Actualizar);
    echo 1;
}catch(Exception $e){
    echo 2;
}

        
?>