<?php
require "../../php/conexion.php";

$Buscar='SELECT DISTINCT on (id_equipo) MAX(version_equipo), nombre,id_equipo FROM equipos GROUP BY version_equipo,nombre,id_equipo ORDER BY id_equipo,version_equipo DESC';
$query=pg_query($conexion,$Buscar);

$html='<option value="0">Seleccione una opcion</option>';

if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_equipo'].'">'.$row['nombre'].'</option>';
    }
}else{
    $html='<option value="0">No se encontraron resultados</option>';
}

echo $html;
?>