<?php
require "../../php/conexion.php";


$NoAnalais=$_POST['No_Analisis'];
$Nombre=$_POST['Nombre'];
$Abrebiatura=$_POST['Abrebiatura'];

$Buscar="SELECT id_analisis from analisis where id_analisis=$NoAnalais";
$querybus=pg_query($conexion,$Buscar);

if(pg_num_rows($querybus)==0){
    $Agregar="INSERT INTO analisis (id_analisis, nombre, abreviatura) VALUES ('$NoAnalais','$Nombre','$Abrebiatura')";
    pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>