
<?php
//Agregar nuevo dato  a bitacora de reactivos


require "../../php/conexion.php";
session_start();

//Obtener datos de formulario
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

echo $Buscarmax;

//Busca el identificador maximo y le agrega uno
$BuscarIdentificador="SELECT MAX(identificador) AS identificadormax FROM bitacora_reactivos where id_bitacora_reactivo ='$identificar' and id_folio='$Folio'";
$queryIdentificador=pg_query($conexion,$BuscarIdentificador);
$rowIdentificador=pg_fetch_assoc($queryIdentificador);
$IdentificadorMax=$rowIdentificador['identificadormax']+1;

$Identificador_bitacora=$Folio.'1';
$Insertar="INSERT INTO public.bitacora_reactivos(
	id_bit_reactivo, version_bitacora_reactivo, id_folio, version_foio, id_reactivo, fecha_apertura, id_folio_bitacoras, id_version_bitacora, version_bitacora)
	VALUES (?, '1', '$Folio', '1', '$Reactivo', '$Apertura', '$ReactivoBitacora', '$Datos', '$vercionmax');";
pg_query($conexion,$Insertar);



?>