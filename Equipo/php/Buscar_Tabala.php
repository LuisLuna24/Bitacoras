<?php
require "../../php/conexion.php";

$Buscar= "SELECT id_equipo, identificador, version, nombre, descripcion, id_area FROM public.equipo;";
$query=pg_query($conexion,$Buscar);

$html='';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<tr>';
        $html.='<td>'. $row['identificador'] .'</td>';
        $html.='<td>'. $row['nombre'] .'</td>';
        $html.='<td>'. $row['descripcion'] .'</td>';
        $html.='<td>'. $row['id_area'] .'</td>';
        $html.='<td><a href="">Editar</a></td>';
        $html.='<td><a href="">Eliminar</a></td>';
        $html.='</tr>';
    }
}

echo $html;


?>