<?php
require "../../php/conexion.php";
session_start();


$Version_Equipo=$_SESSION['VersionEquipo'];
$id_equipo_pcr=$_SESSION["No_Equipo_Pcr"];
$Buscar="SELECT DISTINCT on (equipos_pcr.id_equipo) nombre,equipos_pcr.no_equipo_pcr,equipos_pcr.id_equipo_pcr FROM equipos_pcr 
        INNER JOIN equipos on equipos.id_equipo=equipos_pcr.id_equipo INNER JOIN bitacoras_pcr on bitacoras_pcr.id_equipo_pcr = equipos_pcr.id_equipo_pcr
        where no_registro::text ILIKE '%" . $id_equipo_pcr . "%' and equipos_pcr.version_equipo_pcr='$Version_Equipo';";
$query=pg_query($conexion,$Buscar);

$html="";

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<tr>';
        $html.='<td>' . $row['no_equipo_pcr'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['id_equipo_pcr'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
echo $html;
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
    echo $html;
    
}

?>