<?php

//Eliminar reactivo agregado a la tabla de bitacora de reactivos

require "../../php/conexion.php";
session_start();
$identificaro=$_GET['IdentificadorRea'];
$Folio=$_SESSION['No_FoliRec'];

$Eliminar="DELETE FROM bitacora_reactivos where identificador_registro= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Reactivos.php');
?>