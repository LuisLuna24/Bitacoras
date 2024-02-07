<?php

//Eliminar reactivo agregado a la tabla de bitacora de reactivos

require "../../php/conexion.php";
session_start();
$identificaro=$_GET['identificado'];
$Folio=$_SESSION['No_FoliRec'];

$Eliminar="DELETE FROM bitacora_reactivos where id_bitacora_reactivo= '$identificaro' and id_folio='$Folio'";
pg_query($conexion,$Eliminar);

header('Location: ../Reactivos.php');
?>