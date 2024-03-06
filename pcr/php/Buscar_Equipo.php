<?php
require "../../php/conexion.php";

$Buscar="SELECT DISTINCT on (id_equipo) id_equipo, vercion_equipo, identificador, nombre, descripcion, id_area, estado_equipo FROM equipo GROUP BY id_equipo, vercion_equipo, identificador, nombre, descripcion, id_area, estado_equipo";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'. $row['id_equipo']. '">'. $row['identificador']."  ".$row['nombre'].'</option>';
    }
}

echo $html;

?>