
<?php
//Agregar nuevo dato en la nueva versión de bitácora reactivo  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Reactivo"];
$VercionMax=$_SESSION["VercionMax"];

//Obtener datos de formulario
$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION['No_FoliRec'];
$Reactivo=$_POST['Reactivos_Select'];
$Lote=$_POST['Lote_Reactivo'];
$Apertura1=$_POST['Apertura_Reactivo'];
$Apertura= date("Y-m-d", strtotime($Apertura1));
$Caducidad1=$_POST['Caducidad_Reactivo'];
$Caducidad= date("Y-m-d", strtotime($Caducidad1));
$FolioReactivo=$_POST['Folio_Reactivo'];
$Tipo_Bitacora=$_POST['Tipo_Bitacora'];

//Generar nuevo no de regisatro
$BuscarNo="SELECT MAX(no_reactivo) FROM bitacora_reactivos where id_folio='$Folio'";
$queryNo=pg_query($conexion,$BuscarNo);
$rowNo=pg_fetch_assoc($queryNo);
$No=$rowNo['max']+1;


//Buscar Version maxima del reactivo
$BuscarReac="SELECT MAX(version_reactivo) FROM reactivos WHERE id_reactivo='$Reactivo'";
$queryReac=pg_query($conexion,$BuscarReac);
$rowReac=pg_fetch_assoc($queryReac);
$version_reactivo=$rowReac['max'];

//Buscar versdion maxima de tipio de vitacora
$BuscarTipo="SELECT MAX(version_bitacora) FROM version_bitacora WHERE id_vercion_bitacora='$Tipo_Bitacora'";
$queryTipo=pg_query($conexion,$BuscarTipo);
$rowTipo=pg_fetch_assoc($queryTipo);
$version_bitacora=$rowTipo['max'];


$Identificador=$Folio.$VercionMax;
$identificador_registro=$Reactivo.$VercionMax.$No.$Folio;
$Insertar="INSERT INTO public.bitacora_reactivos(
	id_bit_reactivo, version_bit_reactivo, no_reactivo, identificador_bitacora, id_folio, version_folio, id_reactivo, version_reactivo, fecha_apertura, fecha_caducidad, folio_bitacora, id_version_bitacora, version_bitacora, id_usuario,version_registro, identificador_registro)
	VALUES ('$Reactivo', '$VercionMax', '$No', '$Identificador', '$Folio', '$VercionMax', '$Reactivo', '$version_reactivo', '$Apertura', '$Caducidad', '$FolioReactivo','$Tipo_Bitacora', '$version_bitacora', '$id_Usuario','1',$identificador_registro);";
pg_query($conexion,$Insertar);




?>