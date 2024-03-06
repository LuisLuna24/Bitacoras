<?php
//Buscar los datos del equipo a actualizar y mandarlos en JSON

require "../../php/conexion.php";
session_start();

$Registro=$_SESSION['RegistroPcr'];

$Buscar="SELECT MAX(version_registro) id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, archivo, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, id_admin, version_folio, version_registro, identificador_registro
FROM public.bitacora_pcr where identificador_registro='$Registro' GROUP BY id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, archivo, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, id_admin, version_folio, version_registro, identificador_registro;";
$query=pg_query($conexion,$Buscar);


//Obtener el array de los datos del equipo
$output=[];

if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $output['id_pcr']=$row['id_pcr'];
    $output['id_analisis']=$row['id_analisis'];
    $output['fecha']=$row['fecha'];
    $output['agarosa']=$row['agarosa'];
    $output['voltage']=$row['voltage'];
    $output['tiempo']=$row['tiempo'];
    $output['sanitizo']=$row['sanitizo'];
    $output['tiempouv']=$row['tiempouv'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}

?>