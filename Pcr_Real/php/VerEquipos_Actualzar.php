<?php  

require "../../php/conexion.php";
session_start();

$Vercion=$_SESSION["EquipoMax"];
$Folio=$_SESSION["pcreal_fol"];

$Equipobit="SELECT DISTINCT on (id_equipo) nombre,id_equipo_pcreal, equipo_pcreal.identificador, version_equipo_pcr, equipo_pcreal.id_equipo, equipo_pcreal.version_equipo, ver_equipo_pcreal
FROM public.equipo_pcreal INNER JOIN equipo on equipo.id_equipo = equipo_pcreal.id_equipo where id_equipo_pcreal='$Folio' AND version_equipo_pcr='$Vercion'";
$queryEquipo=pg_query($conexion,$Equipobit);

$html="";

if(pg_num_rows($queryEquipo)!=0){
    while($row=pg_fetch_assoc($queryEquipo)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td>Eliminar</td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;

?>