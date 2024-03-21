<?php
//Permite eliminar equipo seleccionado de la tabla equipo seleccionado

require "../../php/conexion.php";
session_start();

$Identificador=$_GET['EquipoExtra'];
$NoEquipo =$_SESSION['No_Foli'];

$Eliminr="DELETE FROM equipo_extraccion where identificador_equipo_extraccion='$Identificador';";
pg_query($conexion,$Eliminr);


header('Location: ../Extraccion.php');
?>