<?php

require "../../php/conexion.php";

//busca los tipos de bitacoras que existen conforme a su vesion maxima

$Buscar="SELECT MAX(version_bitacora) id_vercion_bitacora, version_bitacora, nombre_version FROM public.version_bitacora  where id_vercion_bitacora= 1 or  id_vercion_bitacora= 2 or  id_vercion_bitacora= 3 GROUP BY id_vercion_bitacora, version_bitacora, nombre_version;";
$query=pg_query($conexion,$Buscar);
$html='<option values="0">Seleccione una opcion</option>';
if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html .='<option value="'.$row['id_vercion_bitacora'].'">'.$row['nombre_version'].'</option>';
    }
}else{
    $html .='<option values="0">Sin Resultados</option>';
}

echo $html;
?>