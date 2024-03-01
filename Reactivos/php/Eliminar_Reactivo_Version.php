<?php

//Eliminar reactivo agregado a la tabla de bitacora de reactivos

require "../../php/conexion.php";
session_start();
$identificaro=$_GET['Identificador'];
$Folio=$_SESSION['No_FoliRec'];
$Version=$_SESSION["VercionMax"];

$Eliminar="DELETE FROM bitacora_reactivos where identificador_registro= '$identificaro'";
//pg_query($conexion,$Eliminar);

header('Location: ../Reactivos.php');
?>