<?php
require "../../php/conexion.php";
session_start();


if(isset($_SESSION['No_Folio'])){
    $No_Regitro=$_SESSION['No_Folio'];
}else{
    $No_Regitro='0';
}

$Folio=$_SESSION["No_Folio"];
$Version=$_SESSION['VersionMax'];

//Permite ver las especies agregadas 
$Buscar="SELECT id_especie_pcr, identificador_especie, especie.nombre,version_especie_pcr, especie_pcr.id_especie, especie_pcr.vercion_especie, no_registro
FROM public.especie_pcr INNER JOIN especie on especie.id_especie=especie_pcr.id_especie
where id_especie_pcr::text='$Folio'  and no_registro::text='$No_Regitro' and version_especie_pcr='$Version';";
$query=pg_query($conexion,$Buscar);

$html="";

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador_especie'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['id_especie'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else if(pg_num_rows($query)==0){
    $html.='<tr>';
    $html.='<td>Sin Especies</td>';
    $html.='</tr>';
}

echo $html;


?>

