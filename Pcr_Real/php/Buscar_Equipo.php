<?php
require "../../php/conexion.php";


$Buscar= "SELECT DISTINCT on (id_equipo) id_equipo, identificador, nombre, descripcion, id_area FROM public.equipo ORDER BY id_equipo,vercion_equipo DESC ";
$query=pg_query($conexion,$Buscar);

$html='<option value="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_equipo'].'">'.$row['nombre']. $row['descripcion'] . ': ' . $row['identificador'] .'</option>';
    }
}

echo $html;


?>