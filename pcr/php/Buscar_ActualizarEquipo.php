<?php
require "../../php/conexion.php";
session_start();

$Vercion=$_SESSION['VercionMax'];
$NoEquipo =$_SESSION["pcr_fol"];
$Buscra="SELECT DISTINCT equipo_pcr.identificador AS identificadorpcr, equipo.identificador AS identificador,nombre FROM equipo_pcr INNER JOIN equipo on equipo.id_equipo = equipo_pcr.id_equipo WHERE id_equipo_pcr::text='$NoEquipo' and version_equipo::text='$Vercion';";
$resultado=pg_query($conexion,$Buscra);

$html='';

while($row=pg_fetch_assoc($resultado)){
    $html.='<tr>';
    $html.='<td>'. $row['identificador'].'</td>';
    $html.='<td>'. $row['nombre'].'</td>';
    $html.='<td><a href="./php/Eliminar_Equipo.php?Eqipo='.$row['identificadorpcr'].'">Eliminar</a></td>';
    $html.='</tr>';
}

echo $html;


?>