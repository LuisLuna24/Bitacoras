<?php
require "../../php/conexion.php";


$Buscar="SELECT id_reactivo, identificador, no_lote, nombre, descripcion, abreviatura FROM public.reacivos;";
$query=pg_query($conexion,$Buscar);
$out="";
if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $out.="<option value='".$row['id_reactivo']."'>".$row['nombre']."--".$row['descripcion']."</option>";
    }
}

echo $out;


?>