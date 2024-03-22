<?php
//Permite eliminar equipo seleccionado de la tabla equipo seleccionado

require "../../php/conexion.php";
session_start();

$Identificador=$_GET['EquipoPcr'];
$NoEquipo =$_SESSION['No_Foli'];

$Eliminr="DELETE FROM equipo_pcr where identificador_equipo_pcr='$Identificador';";
pg_query($conexion,$Eliminr);


header('Location: ../Bitacora_Pcr.php');
?>