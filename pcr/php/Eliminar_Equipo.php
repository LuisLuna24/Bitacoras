<?php
require "../../php/conexion.php";
session_start();

$Identificador=$_GET['Eqipo'];
$NoEquipo =$_SESSION['No_Foli'];

$Eliminr="DELETE FROM equipo_pcr where identificador='$Identificador' and id_equipo_pcr='$NoEquipo'";
pg_query($conexion,$Eliminr);


header('Location: ../Bitacora_Pcr.php');
?>