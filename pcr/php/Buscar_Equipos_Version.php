<?php
require "../../php/conexion.php";
session_start();


$Folio=$_SESSION["No_Folio_Ver"];
$RegistroPcr=$_SESSION['RegistroPcr'];

//Permite ver las especies agregadas 
$Buscar="SELECT id_equipo_pcr, equipo_pcr.identificador, version_equipo_pcr, equipo.id_equipo, version_equipo, ver_equipo_pcr, equipo.nombre
FROM public.equipo_pcr INNER JOIN equipo on equipo.id_equipo = equipo_pcr.id_equipo
where id_equipo_pcr::text='$Folio' and ver_equipo_pcr::text='$RegistroPcr';";
$query=pg_query($conexion,$Buscar);

$html="";

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='</tr>';
    }
}else if(pg_num_rows($query)==0){
    $html.='<tr>';
    $html.='<td>Sin Equipos</td>';
    $html.='</tr>';
}

echo $html;


?>

