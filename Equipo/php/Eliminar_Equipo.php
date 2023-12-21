<?php

require "../../php/conexion.php";

$identificaro=$_GET['Equipo'];
$Eliminarextra="DELETE FROM equposeleccionado where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminarextra);

$Eliminarpcr="DELETE FROM equipo_pcr where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminarpcr);

$Eliminarpcreal="DELETE FROM equipo_pcreal where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminarpcreal);

$Eliminar="DELETE FROM equipo where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Equipo.php');



?>