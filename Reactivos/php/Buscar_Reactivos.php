<?php
require "../../php/conexion.php";
//Muestra los Reactivos del inventario de Reactivos 

$Buscar="SELECT id_reactivo, nombre, descripcion, cantidad, fecha_caducidad, lote, estado FROM public.reactivos;";
$query=pg_query($conexion,$Buscar);
$out="<option value='0'>Seleccione Reactivo</option>";
if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $out.="<option value='".$row['id_reactivo']."'>".$row['nombre']."--".$row['descripcion']."</option>";
    }
}

echo $out;


?>