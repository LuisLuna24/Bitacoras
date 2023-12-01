<?php

require "../php/conexion.php";

$html="";

$Buscar="SELECT id_categoria, nombre_categoria FROM public.categoria_equipo;";
$Resultado=pg_query($conexion,$Buscar);

if(pg_num_rows($Resultado)!=0){
    while($Row=pg_fetch_assoc($Resultado)){
        $html.= "<option value=".$Row["id_categoria"].">".$Row["nombre_categoria"]."</option>";
        
    }
    echo $html;
}else{
    $html = "<option value=0>No se encontraron áreas</option>";
    echo $html;
}


?>