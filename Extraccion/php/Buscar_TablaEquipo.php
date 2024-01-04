<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Foli'];



$buscarEquipo="SELECT id_equipo_extraccion, equipo_extraccion.identificador, equipo.id_equipo ,nombre FROM public.equipo_extraccion INNER JOIN equipo on equipo.id_equipo=equipo_extraccion.id_equipo  where id_equipo_extraccion ='$Folio' ;";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

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