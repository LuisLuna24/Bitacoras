<?php
require "conexion.php";

session_start();

$Buscarfolio="SELECT MAX(id_folio) as folio FROM public.folio_pcr;";
$query=pg_query($conexion,$Buscarfolio);
$numfol=pg_fetch_assoc($query);
$nuevo=$numfol['folio']+1;


$id_vercion='2';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];



$crearfolio="INSERT INTO public.folio_pcr(id_folio, folio, id_version_bitacora, version_bitacora,fecha_creacion) VALUES ($nuevo, $nuevo,$id_vercion,$vercion,CURRENT_DATE);";
pg_query($conexion,$crearfolio);

$_SESSION["pcr_fol"]=$nuevo;
echo 1;


?>