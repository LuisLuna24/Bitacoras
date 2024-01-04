<?php
require "../../php/conexion.php";


$Reactivos=$_GET['REgistro'];
$Eliminar="DELETE FROM public.birtacora_extaccion WHERE identificador_bitacora = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Extraccion.php");




?>