<?php
require "conexion.php";

//Crear nuevo folio de PCR Tiempo real

session_start();


//Crea nuevo folio tomando el ultimo folio y sumando uno
$Buscarfolio="SELECT MAX(if_folio) as folio FROM public.folio_pcreal;";
$query=pg_query($conexion,$Buscarfolio);
$numfol=pg_fetch_assoc($query);
$nuevo=$numfol['folio']+1;

//toma la verion mas alta 
$id_vercion='3';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];

//crea nuevo folio
$crearfolio="INSERT INTO public.folio_pcreal(if_folio, folio, id_version_bitacoras, version_bitacoras,fecha_elaboracion) VALUES ($nuevo, $nuevo,$id_vercion,$vercion,CURRENT_DATE);";
pg_query($conexion,$crearfolio);

$_SESSION["pcreal_fol"]=$nuevo;
echo 1;


?>