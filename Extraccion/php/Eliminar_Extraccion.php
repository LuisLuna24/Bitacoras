<?php

require "../../php/conexion.php";

session_start();

$Folio=$_GET['No_Folio'];

$BuscarFolio="SELECT * FROM birtacora_extaccion where folio = '$Folio'";
$query=pg_query($conexion,$BuscarFolio);

if(pg_num_rows($query)>0){
    $CancerExtraccion="DELETE FROM birtacora_extaccion where folio = '$Folio'";
    pg_query($conexion,$CancerExtraccion);
    $CancelarEquipo="DELETE FROM equposeleccionado where id_equiposeleccionado = '$Folio'";
    pg_query($conexion,$CancelarEquipo);
    $CancelarFolio="DELETE FROM ver_folioextraccion where id_folio = '$Folio'";
    pg_query($conexion,$CancelarFolio);
    header("Location: ../Ver_Extraccion.php");
}else{
    
}



?>