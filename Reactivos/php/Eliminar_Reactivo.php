<?php

require "../../php/conexion.php";

$identificaro=$_GET['identificado'];

$Eliminar="DELETE FROM bitacora_reactivos where id_bit_reactivo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Reactivos.php');
?>