<?php
require "../../php/conexion.php";
session_start();

//Agregar nuevos reactivos al inventario


//Obtiene los datos de los reactivos a través de Ajax
$Nombre=$_POST['Reacivo_Nombre'];
$Descripcion=$_POST['Reactivo_Descripcion'];
$Cantidad=$_POST['Reactivo_Cantidad'];
$Lote=$_POST['Reactivo_Lote'];
$Fecha=$_POST['Reactivo_Caducidad'];
$fcaducidad= date("Y-m-d", strtotime($Fecha));

//Busca si existe el reactivo en caso de no existir repetido agega nuevo reactivo
$Buscar="SELECT * FROM reactivos where lote = '$Lote'";
$resultado=pg_query($conexion,$Buscar);
if(pg_num_rows($resultado)==0){
    $Agregar="INSERT INTO public.reactivos(
        version_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote, estado)
        VALUES ('1', '$Nombre', '$Descripcion', '$Cantidad', '$fcaducidad', '$Lote', 'Existencia');";
        pg_query($conexion,$Agregar);
        echo 1;
}else{
    echo 2;
}





?>