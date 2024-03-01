<?php
require "../../php/conexion.php";
session_start();


$Registro=$_SESSION['RegistroExtraN'];

$Buscar="SELECT MAX(version_registro) ,id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario, id_admin, version_registro, identificador_registro
FROM public.bitacora_extraccion where identificador_registro='$Registro' GROUP BY id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario, id_admin, version_registro, identificador_registro;";

$query=pg_query($conexion,$Buscar);

$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['id_extracion']=$row['id_extracion'];
    $output['fecha']=$row['fecha'];
    $output['id_metodo']=$row['id_metodo'];
    $output['id_analisis']=$row['id_analisis'];
    $output['id_area']=$row['id_area'];
    $output['conc_ng_ul']=$row['conc_ng_ul'];
    $output['dato_260_280']=$row['dato_260_280'];
    $output['dato_260_230']=$row['dato_260_230'];
    
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}



?>
