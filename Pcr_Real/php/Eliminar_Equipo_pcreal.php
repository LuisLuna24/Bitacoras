<?php
//Permite eliminar equipo seleccionado de la tabla equipo seleccionado

require "../../php/conexion.php";
session_start();

$Identificador=$_GET['EquipoPcreal'];
$NoEquipo =$_SESSION['No_Foli'];

$Eliminr="DELETE FROM equipo_pcreal where identificador_equipo_pcreal='$Identificador';";
pg_query($conexion,$Eliminr);


header('Location: ../Pcr_Real.php');
?>