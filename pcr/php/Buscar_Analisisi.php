<?php
require "../../php/conexion.php";

$Buscar='SELECT MAX(version_analisis), nombre,id_analisis FROM analisis GROUP BY version_analisis,nombre,id_analisis ORDER BY version_analisis DESC';
$query=pg_query($conexion,$Buscar);

$html='<option value="0">Seleccione una opcion</option>';

if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_analisis'].'">'.$row['nombre'].'</option>';
    }
}

echo $html;
?>