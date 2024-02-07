<?php

require "../../php/conexion.php";

//busca los tipos de bitacoras que existen conforme a su vesion maxima

$Buscar="SELECT id_version_bitacora, version_bitacora, nombre_version FROM public.version_bitacora where id_version_bitacora= 1 or  id_version_bitacora= 2 or  id_version_bitacora= 3;";
$query=pg_query($conexion,$Buscar);
$html='<option values="0">Seleccione una opcion</option>';
if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html .='<option value="'.$row['id_version_bitacora'].'">'.$row['nombre_version'].'</option>';
    }
}else{
    $html .='<option values="0">Sin Resultados</option>';
}

echo $html;
?>