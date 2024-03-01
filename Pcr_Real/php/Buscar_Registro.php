<?php
require "../../php/conexion.php";
session_start();


$Registro=$_SESSION['Registro_Pcreal'];

$Buscar="SELECT MAX(version_registro) ,id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, id_admin, archivo, version_folio, version_registro, identificador_registro
FROM public.bitacora_pcreal where identificador_registro='$Registro' GROUP BY id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, id_admin, archivo, version_folio, version_registro, identificador_registro
ORDER BY version_registro DESC;";

$query=pg_query($conexion,$Buscar);

$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['id_pcreal']=$row['id_pcreal'];
    $output['id_analisi']=$row['id_analisi'];
    $output['fecha']=$row['fecha'];
    $output['sanitizo']=$row['sanitizo'];
    $output['tiempouv']=$row['tiempouv'];
    $output['resultado']=$row['resultado'];
    $output['observaciones']=$row['observaciones'];
    
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}



?>
