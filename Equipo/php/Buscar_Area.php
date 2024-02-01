<?php
//Este hace una consulta para mostrar las áreas disponibles para el select de área

require "../../php/conexion.php";

$Buscar= "SELECT id_area, nombre FROM public.area;";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un area</option>';

//Imprime en el select todos los resultados obtenidos 
if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="' . $row['id_area'] . '">'. $row['nombre'] .'</option>';
    }
}

echo $html;

?>