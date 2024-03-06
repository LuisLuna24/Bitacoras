<?php
//Permite visualizar el nombre de la especie que se desea editar
require "../../php/conexion.php";
session_start();

$id_Especie=$_SESSION['Especie_Anterior'];

$Buscar="SELECT nombre FROM especie where id_especie='$id_Especie' ORDER BY vercion_especie DESC";
$querybuscar=pg_query($conexion,$Buscar);

$row=pg_fetch_assoc($querybuscar);


$output['nombre']=$row['nombre'];

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>