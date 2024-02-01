<?php
//Eliminar los reactivos existentes 

require "../../php/conexion.php";

$Reactivos=$_GET['Reactivo'];
$Eliminar="DELETE FROM reactivos where id_reactivo = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Alta_Reactivos.php");



?>