<?php
//Permite visualizar el nombre del metodo que se desea editar
require "../../php/conexion.php";
session_start();

$id_Especie=$_SESSION['Metodo'];

$Buscar="SELECT nombre FROM metodo where id_metodo='$id_Especie'";
$querybuscar=pg_query($conexion,$Buscar);

$row=pg_fetch_assoc($querybuscar);


$output['nombre']=$row['nombre'];

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>