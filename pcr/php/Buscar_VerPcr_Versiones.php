<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Folio_Ver'];


$columns=['nombre_version','fecha_creacion','usuario.apellido','usuario.nombre','id_pcr', 'no_registro', 'version_pcr', 'bitacora_pcr.id_folio', 'identificador_bitacora', 'id_analisis', 'fecha', 'agarosa', 'voltage', 'tiempo', 'sanitizo', 'tiempouv', 'id_especie_pcr', 'identificador_especie', 'version_especie', 'archivo', 'resultado', 'id_equipo_pcr', 'identificador_equipo', 'version_equipo', 'usuario.id_usuario', 'bitacora_pcr.id_admin', 'bitacora_pcr.version_folio'];

$table="bitacora_pcr";

$id= 'id_folio';


$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="LEFT JOIN usuario on usuario.id_usuario = bitacora_pcr.id_admin
INNER JOIN folio_pcr on folio_pcr.id_folio = bitacora_pcr.id_folio
INNER JOIN version_bitacora on version_bitacora.id_vercion_bitacora = folio_pcr.id_version_bitacora";

$where = "WHERE bitacora_pcr.id_folio::text ILIKE '%" . $campo . "%' and bitacora_pcr.id_folio::text = '$Folio'";

$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT DISTINCT on (bitacora_pcr.version_folio) " . implode(", ",$columns) . "
FROM $table 
$join
$where ORDER BY bitacora_pcr.version_folio ASC
$sLimit ";


$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

$sqlTotal="SELECT  count(DISTINCT $id) FROM $table ";
$resTotal=pg_query($conexion,$sqlTotal);
$row_total=pg_fetch_array($resTotal);
$totalRegistros = $row_total[0];


$output=[];
$output['totalRegistros'] = $totalRegistros;
$output['data'] = '';
$output['paginacion'] = '';

if($num_rows>0){
    while($row=pg_fetch_array($resultado)){
        if($_SESSION['Nivel']==2){
            $Validar='<a href="./php/Validar_folio.php?Validar='. $row['identificador_bitacora']. '">Validar</a>';
        }else{
            $Validar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_folio'].'</td>';
        $output['data'].='<td>'. $row['version_folio'].'</td>';
        $output['data'].='<td>'. $row['fecha_creacion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '.$row['apellido'].'</td>';
        $output['data'].='<td><a href="Version_Pcr.php?RegistroPcr='. $row['identificador_bitacora']. '">Ver</a></td>';
        $output['data'].='<td>'.$Validar.'</td>';
        $output['data'].='</tr>';
    }
}else{
    $output['data'].='<tr>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='</tr>';
}


if($output['totalRegistros']>0){
    $totalPaginas=ceil($output['totalRegistros'] / $limit);


    $output['paginacion'].='<nav class="Nav_Paginacion">';
    $output['paginacion'].='<ul class="Paginacion_Tabla">';

    $numeroInicio=1;
    if(($pagina-4)>1){
        $numeroInicio = $pagina-4;
    }

    $numeroFin=$numeroInicio+9;
    if($numeroFin>$totalPaginas){
        $numeroFin=$totalPaginas;
    }

    for($i=$numeroInicio;$i<=$numeroFin;$i++){
        if($pagina == $i){
            $output['paginacion'].='<li class="Pagina"><a class="page-link activo" href="">' . $i . '</a></li>';

        }else{
            $output['paginacion'].='<li class="Pagina"><a class="page-link" href="" onclick="getData('. $i .')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'].='</ul">';
    $output['paginacion'].='</nav>';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);




?>