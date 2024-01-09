<?php

require "../../php/conexion.php";

$identificaro=$_GET['Metodo'];
$Eliminar="DELETE FROM metodo where id_metodo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Metodos.php');



?>