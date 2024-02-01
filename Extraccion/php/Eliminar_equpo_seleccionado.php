<?php
//Permite eliminar equipo seleccionado de la tabla equipo seleccionado

require "../../php/conexion.php";
session_start();

$Identificador=$_GET['Eqipo'];
$NoEquipo =$_SESSION['No_Foli'];

$Eliminr="DELETE FROM equipo_extraccion where identificador='$Identificador' and id_equipo_extraccion='$NoEquipo'";
pg_query($conexion,$Eliminr);


header('Location: ../Extraccion.php');
?>