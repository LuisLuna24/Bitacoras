<?php
require "./conexion.php";
session_start();

$buscar="SELECT MAX(id_folio) AS folio FROM folio_extraccion";
$sqlbuscar=pg_query($conexion,$buscar);
$row=pg_fetch_assoc($sqlbuscar);
$nuevoFolio=$row['folio']+1;

$id_vercion='1';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];


$crearFolion="INSERT INTO public.folio_extraccion(id_folio, folio, id_version_bitacoras, version_bitacoras) VALUES ($nuevoFolio, $nuevoFolio,$id_vercion,$vercion);";
$crear=pg_query($conexion,$crearFolion);
$_SESSION['No_Foli']=$nuevoFolio;
echo 1;







?>