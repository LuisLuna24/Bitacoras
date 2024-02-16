<?php
require "../../php/conexion.php";

$Buscar="SELECT * FROM analisis";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un analisis</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'. $row['id_analisis']. '">'. $row['nombre'].'</option>';
    }
}

echo $html;

?>