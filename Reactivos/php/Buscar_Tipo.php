<?php

require "../../php/conexion.php";



$Buscar="SELECT id_version, version, nombre_version FROM public.version_bitacora;";
$query=pg_query($conexion,$Buscar);
$html='<option values="0">Seleccione una opcion</option>';
if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html .='<option value="'.$row['id_version'].'">'.$row['nombre_version'].'</option>';
    }
}else{
    $html .='<option values="0">Sin Resultados</option>';
}

echo $html;
?>