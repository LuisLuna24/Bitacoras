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

$buscar="SELECT MAX(identificado) FROM bitacora_reactivo where id_bitreactivo='$Folio'";
$querybus=pg_query($conexion,$buscar);
$row=pg_fetch_assoc($querybus);
$identificar=$row['max']+1;
$Insertar="INSERT INTO public.bitacora_reactivo(
	id_bitreactivo, identificado, id_reactivo, nombre, no_lote, fecha_apertura, fecha_caducidad, pruaba_reactivo, id_usuario, id_folio,fechaelabortacion)
	VALUES ($Folio, $identificar, $Reactivo, '$Reactivo', '$Lote', '$Apertura', '$Caducidad', '$Folio', '$id_Usuario', '$Folio',CURRENT_TIMESTAMP);";
pg_query($conexion,$Insertar);



?>