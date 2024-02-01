<?php
require "../../php/conexion.php";

//Eliminar un solo extracciond del registro

$Reactivos=$_GET['REgistro'];
$Eliminar="DELETE FROM public.birtacora_extaccion WHERE identificador_bitacora = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Extraccion.php");




?>