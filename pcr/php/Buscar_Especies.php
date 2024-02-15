<?php

//Busacr las especies existetes en catalogo de especies
require "../../php/conexion.php";

$Buscar= "SELECT id_especie, nombre FROM public.especie;";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione una especie</option>';

while($row=pg_fetch_assoc($query)){
    $html.='<option value="'. $row['id_especie']. '">'. $row['nombre'].'</option>';
}

echo $html;

?>