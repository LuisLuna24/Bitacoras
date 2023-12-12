<?php
require "../../php/conexion.php";

$Reactivos=$_GET['Reactivo'];
$Eliminar="DELETE FROM reacivos where id_reactivo = '$Reactivos' ";
$resultado=pg_query($conexion,$Eliminar);
header("Location: ../Alta_Reactivos.php");



?>