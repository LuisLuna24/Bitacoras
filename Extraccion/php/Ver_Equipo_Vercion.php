<?php  
 //Visualizar los equipos seleccionados de la tabla en nuevo registro de extraccion

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Folio'];

$Version=$_SESSION['Version_Extraccion'];

//Consulta de la tabla equipos
$buscarEquipo="SELECT equipo.nombre,id_equipo_extraccion, equipo_extraccion.identificador, version_equipo_extraccion, equipo_extraccion.id_equipo, equipo_extraccion.version_equipo, ver_equipo_extraccion
FROM public.equipo_extraccion INNER JOIN equipo on equipo.id_equipo=equipo_extraccion.id_equipo 
where ver_equipo_extraccion='$Version';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

//Visualizar los elementos de la tabla 
if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['identificador'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>