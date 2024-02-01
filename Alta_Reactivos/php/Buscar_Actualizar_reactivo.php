<?php

require "../../php/conexion.php";

session_start();

//Busca los datos del reactivo y los escribe en formato JSON


//Obtiene el valor global del ID del reactivo para realizar la búsqueda
$Reactivo=$_SESSION['Reactivo'];

$Buscar="SELECT id_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote, estado FROM reactivos where id_reactivo = $Reactivo";

$resultado=pg_query($conexion,$Buscar);

//Array para obtener los datos de la consulta y mandarlos como JSON
$output=[];

if(pg_num_rows($resultado)>0){
    $row=pg_fetch_assoc($resultado);
    $output['nombre']=$row['nombre'];
    $output['descripcion']=$row['descripcion'];
    $output['lote']=$row['lote'];
    $output['cantidad']=$row['cantidad'];
    $output['fecha_caducidad']=$row['fecha_caducidad'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}
?>