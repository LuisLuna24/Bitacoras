<?php
require "../../php/conexion.php";

//Eliminar un solo extracciond del registro

$Reactivos=$_GET['Registro_Pcreal'];
$Eliminar="DELETE FROM public.bitacora_pcreal WHERE identificador_registro = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Pcr_Real.php");

?>