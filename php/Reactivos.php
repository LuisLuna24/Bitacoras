<?php
require "conexion.php";

session_start();

$buscar="SELECT MAX(id_folio) as folio FROM public.folio_reactivo;";
$sqlbuscar=pg_query($conexion,$buscar);



$id_vercion='4';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];


$row=pg_fetch_assoc($sqlbuscar);
$nuevoFolio=$row['folio']+1;
$crearFolion="INSERT INTO public.folio_reactivo(id_folio, folio, id_version_bitacora, version_bitacora, fecha_creacion) 
    VALUES ('$nuevoFolio', '$nuevoFolio',$id_vercion,$vercion,CURRENT_DATE);";
$crear=pg_query($conexion,$crearFolion);
$_SESSION['No_FoliRec']=$nuevoFolio;
echo 1;


?>