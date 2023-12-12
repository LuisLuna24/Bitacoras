<?php
require "../../php/conexion.php";
session_start();


$Nombre=$_POST['Reacivo_Nombre'];
$Descripcion=$_POST['Reactivo_Descripcion'];
$Serie=$_POST['Reactivo_Serie'];
$Abrebiatura=$_POST['Reactivo_Abrebiatura'];
$identificador=$Nombre.$Serie;

$Buscar="SELECT * FROM reacivos where no_lote = '$Serie'";
$resultado=pg_query($conexion,$Buscar);

if(pg_num_rows($resultado)==0){
    $Agregar="INSERT INTO public.reacivos(
        identificador, no_lote, nombre, descripcion, abreviatura)
       VALUES ('$identificador' , '$Serie', '$Nombre', '$Descripcion', '$Abrebiatura');";
        pg_query($conexion,$Agregar);
        echo 1;
}else{
    echo 2;
}



?>