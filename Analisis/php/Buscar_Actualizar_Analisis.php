<?php
require "../../php/conexion.php";
session_start();

$Id_analisis=$_SESSION['Analisis'];

$Buscar="SELECT  nombre, abreviatura FROM public.analisis where id_analisis = $Id_analisis;";
$query=pg_query($conexion,$Buscar);


$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['nombre']=$row['nombre'];
    $output['abreviatura']=$row['abreviatura'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

?>