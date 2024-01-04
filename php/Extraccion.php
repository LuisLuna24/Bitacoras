<?php
require "./conexion.php";
session_start();

$buscar="SELECT MAX(id_folio) FROM birtacora_extaccion";
$sqlbuscar=pg_query($conexion,$buscar);
$num_rows=pg_num_rows($sqlbuscar);


$id_vercion='1';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];
if($num_rows!=0){
    $row=pg_fetch_assoc($sqlbuscar);
    $nuevoFolio=$row['max']+1;
    $crearFolion="INSERT INTO public.folio_extraccion(id_folio, folio, id_version_bitacoras, version_bitacoras) VALUES ($nuevoFolio, $nuevoFolio,$id_vercion,$vercion);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_Foli']=$nuevoFolio;
    echo 1;
}else if($num_rows==0){
    $nuevoFolio=1;
    $crearFolion="INSERT INTO public.folio_extraccion(id_folio, folio, id_version_bitacoras, version_bitacoras) VALUES ($nuevoFolio, $nuevoFolio,$id_vercion,$vercion);";
    $crear=pg_query($conexion,$crearFolion);
    $_SESSION['No_Foli']=$nuevoFolio;
    echo 2;
}






?>