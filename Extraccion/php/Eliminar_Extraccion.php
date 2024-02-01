<?php

//En caso de no ser revisado por el administrador permite eliminar folio de Extracción 

require "../../php/conexion.php";

session_start();

$Folio=$_GET['No_Folio'];

$BuscarFolio="SELECT * FROM birtacora_extaccion where id_folio = '$Folio'";
$query=pg_query($conexion,$BuscarFolio);

//Elimina todos los datos del folio eliminado
if(pg_num_rows($query)>0){
    $CancerExtraccion="DELETE FROM birtacora_extaccion where id_folio = '$Folio'";
    pg_query($conexion,$CancerExtraccion);
    $CancelarEquipo="DELETE FROM equipo_extraccion where id_equipo_extraccion = '$Folio'";
    pg_query($conexion,$CancelarEquipo);
    $CancelarFolio="DELETE FROM folio_extraccion where id_folio = '$Folio'";
    pg_query($conexion,$CancelarFolio);
    header("Location: ../Ver_Extraccion.php");
}else{
    
}



?>