<?php
require "../../php/conexion.php";
session_start();

$IdenRegistro=$_GET['RegistroPcr'];
$Elimiar="DELETE FROM bitacora_pcr where identificador_registro='$IdenRegistro';";
pg_query($conexion,$Elimiar);

$Eliminar_Especie="DELETE FROM especie_pcr where identificador_registro='$IdenRegistro';";
pg_query($conexion,$Eliminar_Especie);

header("Location:../Bitacora_Pcr.php");

?>