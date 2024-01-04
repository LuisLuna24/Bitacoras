<?php
require "../../php/conexion.php";

$Buscar= "SELECT id_metodo, nombre, abrebiatura FROM public.metodo;";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un metodo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="' . $row['id_metodo'] . '">'. $row['nombre'] .'</option>';
    }
}

echo $html;


?>