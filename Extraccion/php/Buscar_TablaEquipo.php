<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Foli'];



$buscarEquipo="SELECT equposeleccionado.id_equiposeleccionado, equipo.identificador, equipo.id_equipo, equipo.nombre  FROM public.equposeleccionado INNER JOIN equipo on equipo.id_equipo=equposeleccionado.id_equipo where id_equiposeleccionado='$Folio';";
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