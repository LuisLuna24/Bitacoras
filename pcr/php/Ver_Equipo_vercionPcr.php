<?php  

require "../../php/conexion.php";
session_start();

$VersionPcr=$_SESSION["Version_Vitacora"];


$buscarEquipo="SELECT DISTINCT equipo_pcr.id_equipo_pcr, equipo_pcr.identificador, equipo.id_equipo, equipo.nombre  FROM public.equipo_pcr INNER JOIN equipo on equipo.id_equipo=equipo_pcr.id_equipo where ver_equipo = '$VersionPcr';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>