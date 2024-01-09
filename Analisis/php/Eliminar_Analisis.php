<?php
require "../../php/conexion.php";


$Reactivos=$_GET['Analisis'];
$Eliminar="DELETE FROM public.analisis WHERE id_analisis = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Analisis.php");




?>