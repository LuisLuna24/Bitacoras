<?php
require "../../php/conexion.php";

$Buscar="SELECT * FROM equipo";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'. $row['id_equipo']. '">'. $row['identificador']."  ".$row['nombre'].'</option>';
    }
}

echo $html;

?>