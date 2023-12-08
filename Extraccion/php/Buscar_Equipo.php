<?php
require "../../php/conexion.php";

$id_area=$_POST['Area_Select'];

$Buscar= "SELECT id_equipo, identificador, version, nombre, descripcion, id_area FROM public.equipo  WHERE id_area = '$id_area'";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_equipo'].'">'.$row['id_equipo']. $row['nombre'] . ' - ' . $row['descripcion'] .'</option>';
    }
}

echo $html;


?>