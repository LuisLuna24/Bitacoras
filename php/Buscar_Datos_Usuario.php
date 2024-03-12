<?php
require "conexion.php";

$Usuario=$_POST["Actualizar_Select"];

$Buscar="SELECT * FROM usuarios where id_usuario::text='$Usuario'";
$query=pg_query($conexion,$Buscar);
$row=pg_fetch_assoc($query);

$output=[];

$output['nombre']=$row['nombre'];
$output['apellido']=$row['apellido'];
$output['correo']=$row['correo'];

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>