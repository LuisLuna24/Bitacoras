<?php
require "../../php/conexion.php";
session_start();

$Folio=$_GET['No_Folio'];
$_SESSION["No_Folio"]=$_GET["No_Folio"];


//Busca La vercion Maxima 
$BuscraDatosMax="SELECT MAX(version_extracion) FROM bitacora_extraccion;";
$queryDatosMax=pg_query($conexion,$BuscraDatosMax);
$rowDatosMax=pg_fetch_assoc($queryDatosMax);
$DatosMax=$rowDatosMax['max'];
$VersionMax=$rowDatosMax['max']+1;

//Inserta los equipos de la version anterior a la nueva version

$BuscarEquipo="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$Folio' and version_equipo_extraccion='$DatosMax';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);
while($rowEqu=pg_fetch_assoc($queryEquipo)){
    $Ver_Equipo=$Folio.$VersionMax;
    $InsertarEquipo="INSERT INTO public.equipo_extraccion(
        id_equipo_extraccion, identificador, version_equipo_extraccion, id_equipo, version_equipo, ver_equipo_extraccion)
        VALUES ('$Folio','" .$rowEqu['identificador']. "' , '$VersionMax', '" .$rowEqu['id_equipo']. "', '" .$rowEqu['version_equipo']. "', '$Ver_Equipo');";
    pg_query($conexion,$InsertarEquipo);
}

//Inserta los regisros de la version anterior a la nueva version

$BuscarRegistros="SELECT * FROM bitacora_extraccion where id_folio='$Folio' and version_extracion='$DatosMax'";
$queryRegistros=pg_query($conexion,$BuscarRegistros);

while($rowReg=pg_fetch_assoc($queryRegistros)){
    $InsertarRegistros="INSERT INTO public.bitacora_extraccion(
        id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario)
        VALUES ('" .$rowReg['id_extracion']. "', '" .$rowReg['no_registro']. "', '$VersionMax', '" .$rowReg['identificdor_extracion']. "', '" .$rowReg['id_folio']. "', '" .$rowReg['version_folio']. "', '" .$rowReg['fecha']. "', '" .$rowReg['id_metodo']. "', '" .$rowReg['id_analisis']. "', '" .$rowReg['id_area']. "', '" .$rowReg['conc_ng_ul']. "', '" .$rowReg['dato_260_280']. "', '" .$rowReg['dato_260_230']. "', '" .$rowReg['archivo']. "', '" .$rowReg['id_equipo_extraccion']. "', '" .$rowReg['identificador_equipo']. "', '$VersionMax', '" .$rowReg['id_usuario']. "');";
    pg_query($conexion,$InsertarRegistros);
}


$_SESSION["VercionMax"]=$VersionMax;
$_SESSION["EquipoMax"]=$VersionMax;

header("Location:../Actualizar_Vercion_Extraccion.php");

?>

