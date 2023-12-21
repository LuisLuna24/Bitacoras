<?php
require "../../php/conexion.php";
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION['No_FoliRec'];
$Reactivo=$_POST['Reactivos_Select'];
$Lote=$_POST['Lote_Reactivo'];
$Apertura1=$_POST['Apertura_Reactivo'];
$Apertura= date("Y-m-d", strtotime($Apertura1));
$Caducidad1=$_POST['Caducidad_Reactivo'];
$Caducidad= date("Y-m-d", strtotime($Caducidad1));
$ReactivoBitacora=$_POST['Select_Prueba_Reactivo'];
$Datos=$_POST['Tipo_Select'];

$buscarver="SELECT MAX(version) FROM version_bitacora";
$querybusver=pg_query($conexion,$buscarver);
$rowver=pg_fetch_assoc($querybusver);
$versionVer=$rowver['max'];

$buscar="SELECT MAX(id_bit_reactivo) FROM bitacora_reactivos where id_folio='$Folio' ";
$querybus=pg_query($conexion,$buscar);
$row=pg_fetch_assoc($querybus);
$identificar=$row['max']+1;

$Insertar="INSERT INTO public.bitacora_reactivos(
	id_bit_reactivo, id_folio, id_reactivo, no_lote, fecha_apertura, fecha_caducidad, folio_bitacora, id_usuario,tipo_bitacora,version_bitacora)
	VALUES ('$identificar', '$Folio', '$Reactivo', '$Lote', '$Apertura', '$Caducidad', '$ReactivoBitacora', '$id_Usuario', $Datos,$versionVer);";
pg_query($conexion,$Insertar);



?>