<?php

require "../../php/conexion.php";

$identificaro=$_GET['identificado'];

$Eliminar="DELETE FROM bitacora_reactivo where identificado= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Reactivos.php');
?>