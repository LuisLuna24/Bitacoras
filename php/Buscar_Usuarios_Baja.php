<?php
require "conexion.php";
include "encriptado.php";

$Buscar="SELECT * FROM usuario where estado_usuario='0' and nivel_usuario = '1'";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un usuario</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'. $row['id_usuario']. '">'. $row['nombre']." ". $row['apellido'].'</option>';
    }
}

echo $html;

?>