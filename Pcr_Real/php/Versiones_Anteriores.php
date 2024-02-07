<?php
require "../../php/conexion.php";
session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION['Folio_VercionPcreal'];
}


$columns=['id_pcreal','identificador_bitacora' ,'no_registro', 'nombre_version','version_pcreal', 'identificador', 'id_folio','fecha_elaboracion' ,'birtacora_pcreal.id_analisis','analisis.nombre as analisis_nombre' ,'fecha', 'sanitizo', 'tiempouv', 'resultado', 'observaciones', 'id_equipo_pcreal', 'id_usuario','id_admin'];

$table="birtacora_pcreal ";

$id= 'id_pcreal';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN analisis on analisis.id_analisis=birtacora_pcreal.id_analisis INNER JOIN folio_pcreal on folio_pcreal.if_folio=birtacora_pcreal.id_folio INNER JOIN version_bitacora on version_bitacora.id_version_bitacora=folio_pcreal.id_version_bitacoras";

$where = "WHERE identificador::text ILIKE '%" . $campo . "%' and id_folio = '$Folio'  ";


$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT DISTINCT on (version_pcreal)" . implode(", ",$columns) . "
FROM $table 
$join
$where
$sLimit";


$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

$sqlTotal="SELECT count($id) FROM $table ";
$resTotal=pg_query($conexion,$sqlTotal);
$row_total=pg_fetch_array($resTotal);
$totalRegistros = $row_total[0];


$output=[];
$output['totalRegistros'] = $totalRegistros;
$output['data'] = '';
$output['paginacion'] = '';

if($num_rows>0){
    while($row=pg_fetch_array($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_folio'] .'</td>';
        $output['data'].='<td>'. $row['version_pcreal'] .'</td>';
        $output['data'].='<td>'. $row['fecha_elaboracion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['id_admin'] .'</td>';
        $output['data'].='<td><a href="./Ver_VersionPcreal.php?Version_Vitacora='. $row['identificador_bitacora']. '">Ver</a></td>';
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