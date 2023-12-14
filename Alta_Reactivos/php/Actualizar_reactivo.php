<?php

require "../../php/conexion.php";

session_start();

$Reactivo=$_SESSION['Reactivo'];

$Buscar="SELECT * FROM reacivos where id_reactivo = $Reactivo";

$resultado=pg_query($conexion,$Buscar);

$output=[];

if(pg_num_rows($resultado)>0){
    $row=pg_fetch_assoc($resultado);
    $output['nombre']=$row['nombre'];
    $output['descripcion']=$row['descripcion'];
    $output['no_lote']=$row['no_lote'];
    $output['abreviatura']=$row['abreviatura'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
}
?>