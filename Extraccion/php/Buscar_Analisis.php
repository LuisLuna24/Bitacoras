<?php
//Consulta para visualizar análisis en select análisis en Extracción

require "../../php/conexion.php";

$Buscar= "SELECT id_analisis, nombre, abreviatura FROM public.analisis;";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un analisis</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="' . $row['id_analisis'] . '">'. $row['nombre'] .'</option>';
    }
}

echo $html;


?>