<?php  
 //Visualizar los equipos seleccionados de la tabla en nuevo registro de extraccion

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Foli'];

$Version=$_SESSION['Version_Extraccion'];

//Consulta de la tabla equipos
$buscarEquipo="SELECT id_equipo_extraccion, equipo_extraccion.identificador, equipo.id_equipo ,nombre FROM public.equipo_extraccion INNER JOIN equipo on equipo.id_equipo=equipo_extraccion.id_equipo  INNER JOIN birtacora_extaccion on birtacora_extaccion.id_equipo_extraccion = equipo_extraccion.id_equipo_extraccion where id_equipo_extraccion ='$Folio' 
and identificador_bitacora='$Version';";
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