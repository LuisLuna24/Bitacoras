<?php
require "../../php/conexion.php";

//Eliminar un solo extracciond del registro

$Reactivos=$_GET['RegistroExtra'];
$Eliminar="DELETE FROM public.bitacora_extraccion WHERE identificador_registro = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Extraccion.php");




?>