<?php

require "../../php/conexion.php";

$identificaro=$_GET['Equipo'];
$Eliminar="DELETE FROM equipo where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Equipo.php');



?>