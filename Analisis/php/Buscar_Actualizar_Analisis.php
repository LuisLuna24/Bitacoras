<?php
require "../../php/conexion.php";
session_start();

//Buscar los datos del análisis a actualizar y mandarlos en JSON

$Id_analisis=$_SESSION['Analisis'];

$Buscar="SELECT  nombre, abreviatura FROM public.analisis where id_analisis = $Id_analisis;";
$query=pg_query($conexion,$Buscar);

//Obtener el array de los datos del análisis 

$output=[];
if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['nombre']=$row['nombre'];
    $output['abreviatura']=$row['abreviatura'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

?>