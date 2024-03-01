<?php  

require "../../php/conexion.php";
session_start();

$VersionPcr=$_SESSION["Version_Vitacora"];
$Folio=$_SESSION['Folio_VercionPcreal'];



$Equipobit="SELECT equipo.identificador, nombre FROM equipo_pcreal INNER JOIN equipo on equipo.id_equipo = equipo_pcreal.id_equipo where ver_equipo_pcreal='$VersionPcr'";
$queryEquipo=pg_query($conexion,$Equipobit);

$html="";

if(pg_num_rows($queryEquipo)!=0){
    while($row=pg_fetch_assoc($queryEquipo)){
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