<?php
require "../../php/conexion.php";

$Buscar="SELECT * FROM especie";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione una especie</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'. $row['id_especie']. '">'. $row['nombre'] .'</option>';
    }
}

echo $html;

?>