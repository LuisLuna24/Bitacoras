<?php
require "../../php/conexion.php";


$Buscar= "SELECT id_equipo, identificador, nombre, descripcion, id_area FROM public.equipo ";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_equipo'].'">'.$row['nombre']. $row['descripcion'] . ': ' . $row['identificador'] .'</option>';
    }
}

echo $html;


?>