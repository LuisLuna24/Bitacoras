<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["pcr_fol"];



$buscarEquipo="SELECT DISTINCT bitacora_pcr.identificador_bitacora,equipo_pcr.id_equipo_pcr, equipo_pcr.identificador, equipo.id_equipo, equipo.nombre  FROM public.equipo_pcr INNER JOIN equipo on equipo.id_equipo=equipo_pcr.id_equipo INNER JOIN bitacora_pcr  on bitacora_pcr.id_equipo_pcr = equipo_pcr.id_equipo_pcr where equipo_pcr.id_equipo_pcr='$Folio' or identificador_bitacora = '$Folio';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_Equipo.php?Eqipo='.$row['identificador'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>