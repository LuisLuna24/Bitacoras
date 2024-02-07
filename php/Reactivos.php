<?php
require "conexion.php";

//Crear nuevo folio de Reactivos

session_start();

//Crea nuevo folio tomando el ultimo folio 
$buscar="SELECT MAX(id_folio) as folio FROM public.folio_reactivo;";
$sqlbuscar=pg_query($conexion,$buscar);


//toma la verion mas alta 
$id_vercion='4';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_version_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercion=$num['max'];


//crea nuevo folio sumando uno
$row=pg_fetch_assoc($sqlbuscar);
$nuevoFolio=$row['folio']+1;
$crearFolion="INSERT INTO public.folio_reactivo(id_folio, folio, id_version_bitacora, version_bitacora, fecha_creacion) 
    VALUES ('$nuevoFolio', '$nuevoFolio',$id_vercion,$vercion,CURRENT_DATE);";
$crear=pg_query($conexion,$crearFolion);
$_SESSION['No_FoliRec']=$nuevoFolio;
echo 1;


?>