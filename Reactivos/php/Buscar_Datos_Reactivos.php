<?php
//Buscar los datos del reactivo y mostrarlos de manera automatica . Los datos son mandados en JSON

require "../../php/conexion.php";
session_start();

$Reactivo=$_POST['Reactivos_Select'];

$Buscar="SELECT id_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote, estado
FROM public.reactivos where id_reactivo = '$Reactivo';";

$query=pg_query($conexion,$Buscar);


//Obtener el array de los datos del equipo
$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['lote']=$row['lote'];
    $output['fecha_caducidad']=$row['fecha_caducidad'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

?>