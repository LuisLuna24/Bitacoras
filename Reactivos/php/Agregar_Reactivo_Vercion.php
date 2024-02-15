
<?php
//Agregar nuevo dato en la nueva versión de bitácora reactivo  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Reactivo"];
$VercionMax=$_SESSION["VercionMax"];

//Obtener datos de formulario
$id_Usuario=$_SESSION['id_usuario'];
$Reactivo=$_POST['Reactivos_Select'];
$Lote=$_POST['Lote_Reactivo'];
$Apertura1=$_POST['Apertura_Reactivo'];
$Apertura= date("Y-m-d", strtotime($Apertura1));
$Caducidad1=$_POST['Caducidad_Reactivo'];
$Caducidad= date("Y-m-d", strtotime($Caducidad1));
$ReactivoBitacora=$_POST['Select_Prueba_Reactivo'];
$Datos=$_POST['Tipo_Select'];

//Buscar ID maximo y sumar uno para nuevo registro
$buscar="SELECT MAX(id_bitacora_reactivo) FROM bitacora_reactivos where id_folio='$Folio' ";
$querybus=pg_query($conexion,$buscar);
$row=pg_fetch_assoc($querybus);
$identificar=$row['max']+1;

//Buscar la vesion maxima
$Buscarmax="SELECT MAX(version_bitacora) AS vercionmax FROM version_bitacora where id_version_bitacora='$Datos';";
$querybusuerymax=pg_query($conexion,$Buscarmax);
$rowmax=pg_fetch_assoc($querybusuerymax);
$vercionmax=$rowmax['vercionmax'];


//Busca el identificador maximo y le agrega uno
$BuscarIdentificador="SELECT MAX(identificador) AS identificadormax FROM bitacora_reactivos where id_bitacora_reactivo ='$identificar' and id_folio='$Folio'";
$queryIdentificador=pg_query($conexion,$BuscarIdentificador);
$rowIdentificador=pg_fetch_assoc($queryIdentificador);
$IdentificadorMax=$rowIdentificador['identificadormax']+1;


$Identificador=$Folio.$VercionMax;

$Insertar="INSERT INTO public.bitacora_reactivos(
		id_bitacora_reactivo, version_bitacora_reactivo, identificador, id_folio, no_lote, fecha_apertura, fecha_caducidad, id_folio_bitacora, id_usuario, id_reactivo,id_version_bitacora, version_bitacora,fecha_elaboracion,identificador_bitacora)
	VALUES ('$identificar', '$VercionMax', '$IdentificadorMax', $Folio, '$Lote', '$Apertura', '$Caducidad', '$ReactivoBitacora', '$id_Usuario', '$Reactivo','$Datos','$vercionmax',CURRENT_DATE,'$Identificador');";
pg_query($conexion,$Insertar);



?>