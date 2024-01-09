<?php

require "../../php/conexion.php";

session_start();

$Folio=$_GET['No_FoloEliminar'];

$BuscarFolio="SELECT * FROM folio_pcr where id_folio = '$Folio'";
$query=pg_query($conexion,$BuscarFolio);

if(pg_num_rows($query)>0){
    $CancerExtraccion="DELETE FROM bitacora_pcr where id_folio = '$Folio'";
    pg_query($conexion,$CancerExtraccion);
    $CancelarEquipo="DELETE FROM equipo_pcr where id_equipo_pcr = '$Folio'";
    pg_query($conexion,$CancelarEquipo);
    $CancelarFolio="DELETE FROM folio_pcr where id_folio = '$Folio'";
    pg_query($conexion,$CancelarFolio);
    header("Location: ../Ver_Pcr.php");
}else{
    
}



?>