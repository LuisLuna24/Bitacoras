<?php
require "conexion.php";

session_start();

$buscar="SELECT * FROM ver_folioreactivo where folio = (SELECT MAX(folio) from ver_folioreactivo)";
$sqlbuscar=pg_query($conexion,$buscar);
$num_rows=pg_num_rows($sqlbuscar);
if($num_rows!=0){
    $row=pg_fetch_assoc($sqlbuscar);
    $nuevoFolio=$row['folio']+1;
    $crearFolion="INSERT INTO public.ver_folioreactivo(id_folio, folio) VALUES ($nuevoFolio, $nuevoFolio);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_FoliRec']=$nuevoFolio;
    echo 1;
}else if($num_rows==0){
    $nuevoFolio=1;
    $crearFolion="INSERT INTO public.ver_folioreactivo(id_folio, folio) VALUES ($nuevoFolio, $nuevoFolio);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_FoliRec']=$nuevoFolio;
    echo 2;
}


?>