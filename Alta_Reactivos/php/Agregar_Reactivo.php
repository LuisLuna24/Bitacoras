<?php
require "../../php/conexion.php";
session_start();


$Nombre=$_POST['Reacivo_Nombre'];
$Descripcion=$_POST['Reactivo_Descripcion'];
$Cantidad=$_POST['Reactivo_Cantidad'];
$Lote=$_POST['Reactivo_Lote'];
$Fecha=$_POST['Reactivo_Caducidad'];
$fcaducidad= date("Y-m-d", strtotime($Fecha));


$Buscarmax="SELECT MAX(id_reactivo) FROM reactivos;";
$resultadomax=pg_query($conexion,$Buscarmax);
$row=pg_fetch_assoc($resultadomax);
$id_reactivo=$row['max']+1;

$Buscar="SELECT * FROM reactivos where lote = '$Lote'";
$resultado=pg_query($conexion,$Buscar);

if(pg_num_rows($resultado)==0){
    $Agregar="INSERT INTO public.reactivos(
        id_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote, estado)
       VALUES ('$id_reactivo','$Nombre', '$Descripcion', '$Cantidad','$fcaducidad','$Lote','Existencia');";
        pg_query($conexion,$Agregar);
        echo 1;
}else{
    echo 2;
}



?>