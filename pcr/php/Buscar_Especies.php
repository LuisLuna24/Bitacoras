<?php
require "../../php/conexion.php";

$Buscar='SELECT MAX(version_especie), nombre,id_especie FROM especies GROUP BY version_especie,nombre,id_especie ORDER BY version_especie DESC';
$query=pg_query($conexion,$Buscar);

$html='<option value="0">Seleccione una opcion</option>';

if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_especie'].'">'.$row['nombre'].'</option>';
    }
}

echo $html;
?>