<?php
//Consulta para visualizar areas en select análisis en Extracción

require "../../php/conexion.php";

$Buscar= "SELECT id_area, nombre FROM public.area;";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un area</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="' . $row['id_area'] . '">'. $row['nombre'] .'</option>';
    }
}

echo $html;


?>