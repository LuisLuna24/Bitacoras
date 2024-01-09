<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['pcreal_fol'];

$buscarEquipo="SELECT id_equipo_pcreal, equipo_pcreal.identificador, equipo.id_equipo ,equipo.nombre FROM public.equipo_pcreal INNER JOIN equipo on equipo.id_equipo=equipo_pcreal.id_equipo  where id_equipo_pcreal ='$Folio' ;";
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