<?php
//Buscar los datos del equipo a actualizar y mandarlos en JSON

require "../../php/conexion.php";
session_start();

$id_equipo=$_SESSION['Equipo'];

$Buscar="SELECT  id_equipo, identificador, nombre, descripcion, id_area FROM public.equipo where id_equipo = $id_equipo;";
$query=pg_query($conexion,$Buscar);


//Obtener el array de los datos del equipo
$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['id_equipo']=$row['id_equipo'];
    $output['identificador']=$row['identificador'];
    $output['nombre']=$row['nombre'];
    $output['descripcion']=$row['descripcion'];
    $output['id_area']=$row['id_area'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

?>