<?php
require "../../php/conexion.php";
session_start();

$_SESSION["Reactivo"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$BuscarDatosMax="SELECT MAX(version_bit_reactivo) FROM bitacora_reactivos where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);
$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT id_bit_reactivo, version_bit_reactivo, no_reactivo, identificador_bitacora, id_folio, version_folio, id_reactivo, version_reactivo, fecha_apertura, fecha_caducidad, folio_bitacora, id_version_bitacora, version_bitacora, id_usuario, id_admin
FROM public.bitacora_reactivos where id_folio='$Folio' and version_bit_reactivo='$Versiondatos';";
$queryPcr=pg_query($conexion,$BuscarPcreal);
$VersionFolio=$rowDatosmax['max']+1;

//toma la verion mas alta 
$id_vercion='4';
$buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_vercion_bitacora='$id_vercion'";
$sqlbuscarvercion=pg_query($conexion,$buscarvercion);
$num=pg_fetch_assoc($sqlbuscarvercion);
$vercionbit=$num['max'];

$BuscarFecha="SELECT fecha_creacion FROM folio_reactivo where id_folio ='$Folio'";
$sqlFecha=pg_query($conexion,$BuscarFecha);
$rowFecha=pg_fetch_assoc($sqlFecha);
$Fechacracion=date("Y-m-d", strtotime($rowFecha['fecha_creacion']));

$NuevoFolio="INSERT INTO public.folio_reactivo(
	id_folio, version_folio, id_version_bitacora, version_bitacora, fecha_creacion)
	VALUES ('$Folio', '$VersionFolio', '$id_vercion', '$vercionbit', '$Fechacracion');";
$queryFolio=pg_query($conexion,$NuevoFolio);

while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Apertura= date("Y-m-d", strtotime($row['fecha_apertura']));
    $Caducidad= date("Y-m-d", strtotime($row['fecha_caducidad']));
    $Insertar_Nuevo="INSERT INTO public.bitacora_reactivos(
        id_bit_reactivo, version_bit_reactivo, no_reactivo, identificador_bitacora, id_folio, version_folio, id_reactivo, version_reactivo, fecha_apertura, fecha_caducidad, folio_bitacora, id_version_bitacora, version_bitacora, id_usuario )
        VALUES ('".$row['id_bit_reactivo']."', '$VersionMax', '".$row['no_reactivo']."', '$Identificador', '".$row['id_folio']."', '$VersionFolio', '".$row['id_reactivo']."', '".$row['version_reactivo']."', '$Apertura', '$Caducidad', '".$row['folio_bitacora']."', '".$row['id_version_bitacora']."', '".$row['version_bitacora']."', '".$row['id_usuario']."');";
        pg_query($conexion,$Insertar_Nuevo);
}

echo $Insertar_Nuevo;

$_SESSION["VercionMax"]=$VersionMax;

header("Location:../Actualizar_Reactivos.php");

?>