<?php
require "../../php/conexion.php";


$Buscar= "SELECT id_especie, vercion_especie, nombre FROM public.especie;";
$query=pg_query($conexion,$Buscar);

$html='<option value="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_especie'].'">'.$row['nombre'].'</option>';
    }
}

echo $html;


?>