<?php
require "../../php/conexion.php";
session_start();

$Folio=$_GET['No_Folio'];
$_SESSION["No_Folio"]=$_GET["No_Folio"];

$BuscarEquipoMaximo="SELECT MAX(version_equipo) FROM equipo_extraccion where id_equipo_extraccion='$Folio'";
$queryEquipomax=pg_query($conexion,$BuscarEquipoMaximo);
$rowEquipomax=pg_fetch_assoc($queryEquipomax);
$EquipoVersion=$rowEquipomax['max'];


$BuscarEquipo="SELECT id_equipo_extraccion, identificador, id_equipo, version_equipo FROM public.equipo_extraccion where id_equipo_extraccion='$Folio' and version_equipo='$EquipoVersion';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEqu=pg_fetch_assoc($queryEquipo)){
    
    $EquipoMax=$rowEquipomax['max']+1;
    $IdentificadorVEr=$Folio.$EquipoMax;
    $InsertarEquipo="INSERT INTO public.equipo_extraccion(
        id_equipo_extraccion, identificador, id_equipo, version_equipo,equipo_ver)
        VALUES ('$Folio', '".$rowEqu['identificador']."', '".$rowEqu['id_equipo']."', $EquipoMax,'$IdentificadorVEr');";
    pg_query($conexion,$InsertarEquipo);
}

$BuscarDatosMax="SELECT MAX(version_extraccion) FROM birtacora_extaccion where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);
$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT id_extracion, no_registro, identificador, version_extraccion, id_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, id_usuario, id_admin, identificador_bitacora, no_equipo, vercion_equipo
FROM public.birtacora_extaccion where id_folio='$Folio' and version_extraccion='$Versiondatos';";
$queryPcr=pg_query($conexion,$BuscarPcreal);



while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Insertar_Nuevo="INSERT INTO public.birtacora_extaccion(
        id_extracion, no_registro, identificador, version_extraccion, id_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, id_usuario, identificador_bitacora, no_equipo, vercion_equipo)
        VALUES ('".$row['id_extracion']."', '".$row['no_registro']."', '".$row['identificador']."', '$VersionMax', '".$row['id_folio']."', '".$row['fecha']."', '".$row['id_metodo']."', '".$row['id_analisis']."', '".$row['id_area']."', '".$row['conc_ng_ul']."', '".$row['dato_260_280']."', '".$row['dato_260_230']."', '".$row['archivo']."', '".$row['id_equipo_extraccion']."', '".$row['id_usuario']."', '$Identificador', '".$row['no_equipo']."', '$VersionMax');";
        pg_query($conexion,$Insertar_Nuevo);
}

$_SESSION["VercionMax"]=$VersionMax;
$_SESSION["EquipoMax"]=$EquipoMax;

header("Location:../Actualizar_Vercion_Extraccion.php");

?>

