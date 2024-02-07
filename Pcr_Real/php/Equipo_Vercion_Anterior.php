<?php  

require "../../php/conexion.php";
session_start();

$VersionPcr=$_SESSION["Version_Vitacora"];
$Folio=$_SESSION['Folio_VercionPcreal'];

$buscarEquipo="SELECT * FROM birtacora_pcreal where identificador_bitacora='$VersionPcr'";
$queryBuscra=pg_query($conexion,$buscarEquipo);
$rowbit=pg_fetch_array($queryBuscra);

$Equipobit="SELECT equipo.identificador, nombre FROM equipo_pcreal INNER JOIN equipo on equipo.id_equipo = equipo_pcreal.id_equipo where id_equipo_pcreal='$Folio' AND version_equipo='".$rowbit['vercion_equipo']."'";
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