<?php
require "../php/conexion.php";

$Equipo=$_GET['id_equipo'];

$Eliminar="DELETE FROM  equipo where id_equipo = '$Equipo'";
$resultado=pg_query($conexion,$Eliminar);
if ($resultado==true){
    header('Location: ../Equipo.php');
}

?>