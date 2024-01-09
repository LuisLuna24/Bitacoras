<?php

require "../../php/conexion.php";

$identificaro=$_GET['Especie'];
$Eliminar="DELETE FROM especie where id_especie= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Especies.php');



?>