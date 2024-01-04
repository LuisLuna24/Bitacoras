<?php
require "./conexion.php";
session_start();

$buscar="SELECT MAX(id_folio) FROM birtacora_extaccion";
$sqlbuscar=pg_query($conexion,$buscar);
$num_rows=pg_num_rows($sqlbuscar);
if($num_rows!=0){
    $row=pg_fetch_assoc($sqlbuscar);
    $nuevoFolio=$row['max']+1;
    $crearFolion="INSERT INTO public.folio_extraccion(id_folio, folio) VALUES ($nuevoFolio, $nuevoFolio);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_Foli']=$nuevoFolio;
    echo 1;
}else if($num_rows==0){
    $nuevoFolio=1;
    $crearFolion="INSERT INTO public.folio_extraccion(id_folio, folio) VALUES ($nuevoFolio, $nuevoFolio);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_Foli']=$nuevoFolio;
    echo 2;
}





?>