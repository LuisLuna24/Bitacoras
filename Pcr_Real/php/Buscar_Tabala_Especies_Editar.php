<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['pcreal_fol'];
if(isset($_SESSION['No_registro_Especie_pcr'])){
    $No_registro_Especie_pcr=$_SESSION['No_registro_Especie_pcr'];
}else{
    $No_registro_Especie_pcr='';
}

$VersionMax=$_SESSION["VercionMax"];

$buscarEquipo="SELECT DISTINCT on (especies_pcreal.id_especie) nombre,especies_pcreal.id_especie_pcreal, no_especie_pcr,especies_pcreal.version_especie_pcreal, especies_pcreal.id_especie, especies_pcreal.version_especie, especies_pcreal.resultado
FROM public.especies_pcreal INNER JOIN especie on especie.id_especie = especies_pcreal.id_especie  where especies_pcreal.id_especie_pcreal::text ILIKE '%" . $No_registro_Especie_pcr . "%' and version_especie_pcreal='$VersionMax';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['no_especie_pcr'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td>' . $row['resultado'] . '</td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>