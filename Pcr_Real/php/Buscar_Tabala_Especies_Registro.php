<?php  

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['pcreal_fol'];
$identificador=$_SESSION['Registro_Pcreal'];

$buscarEquipo="SELECT nombre,no_especie_pcr,especies_pcreal.id_especie_pcreal, especies_pcreal.version_especie_pcreal, especies_pcreal.id_especie, especies_pcreal.version_especie, especies_pcreal.resultado
FROM public.especies_pcreal INNER JOIN especie on especie.id_especie = especies_pcreal.id_especie INNER JOIN 
bitacora_pcreal on bitacora_pcreal.id_especie_pcreal = especies_pcreal.id_especie_pcreal  where identificador_registro='$identificador';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['no_especie_pcr'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td>' . $row['resultado'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['id_especie_pcreal'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>