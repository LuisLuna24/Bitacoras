<?php
require "../../php/conexion.php";

//Agregar nuevo análisis al catálogo de análisis

$Nombre=$_POST['Nombre'];
$Abrebiatura=$_POST['Abrebiatura'];

//Busca el id máximo existente y le agrega uno para agregar un nuevo registro
$Buscar="SELECT MAX(id_analisis) FROM analisis";
$querybuscar=pg_query($conexion,$Buscar);
$row=pg_fetch_assoc($querybuscar); 
$id_analisis=$row['max']+1;

//Busca si el análisis es existente o no
$BuscarAnalisis="SELECT * FROM analisis where nombre='$Nombre'";
$QueryAnalisis=pg_query($conexion,$BuscarAnalis);

//Agrega en análisis
if(pg_num_rows($QueryAnalisis)>0){
    $Agregar="INSERT INTO analisis ( id_analisis,nombre, abreviatura) VALUES ('$id_analisis','$Nombre','$Abrebiatura')";
    pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>