<?php
require "../../php/conexion.php";


$Nombre=$_POST['Nombre'];
$Abrebiatura=$_POST['Abrebiatura'];
$Buscar="SELECT MAX(id_analisis) FROM analisis";
$querybuscar=pg_query($conexion,$Buscar);
$row=pg_fetch_assoc($querybuscar); 
$id_analisis=$row['max']+1;

try {
    $Agregar="INSERT INTO analisis ( id_analisis,nombre, abreviatura) VALUES ('$id_analisis','$Nombre','$Abrebiatura')";
    pg_query($conexion,$Agregar);
    echo 1;

}catch(Exception $e){
    echo 2;
}

?>