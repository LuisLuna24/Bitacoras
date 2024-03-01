<?php

require "../../php/conexion.php";

session_start();

//Busca los datos del reactivo y los escribe en formato JSON


//Obtiene el valor maximo de la version del reactivo
$Reactivo=$_SESSION['Reactivo'];

$Buscarmax="SELECT MAX(version_reactivo)  FROM reactivos where id_reactivo = $Reactivo;";
$resultadomax=pg_query($conexion,$Buscarmax);
$rowmax=pg_fetch_assoc($resultadomax);
$version=$rowmax['max'];

//Obtien los valores del maximo del reactivo

$Buscar="SELECT nombre,descripcion,lote,cantidad,fecha_caducidad FROM reactivos where id_reactivo='$Reactivo' and version_reactivo='$version'";
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