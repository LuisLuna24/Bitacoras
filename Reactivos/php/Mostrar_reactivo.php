<?php

require "../../php/conexion.php";

session_start();

$Reactivo=$_SESSION['identificador'];

$Buscar="SELECT * FROM bitacora_reactivos where id_bit_reactivo = '$Reactivo'";

$resultado=pg_query($conexion,$Buscar);

$output=[];

if(pg_num_rows($resultado)>0){
    $row=pg_fetch_assoc($resultado);
    $output['id_reactivo']=$row['id_reactivo'];
    $output['no_lote']=$row['no_lote'];
    $output['fecha_apertura']=$row['fecha_apertura'];
    $output['fecha_caducidad']=$row['fecha_caducidad'];
    $output['tipo_bitacora']=$row['tipo_bitacora'];
    $output['folio_bitacora']=$row['folio_bitacora'];
    

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}
?>