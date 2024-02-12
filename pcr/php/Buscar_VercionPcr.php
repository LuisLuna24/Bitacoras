<?php

 
//Permite la paginación y consulta para la tabla que muestra las versiones de un folio

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Version_Vitacora"];


$columns=['version_pcr','folio_pcr.id_folio', 'folio', 'folio_pcr.id_version_bitacora', 'folio_pcr.version_bitacora','nombre_version','fecha_creacion','admin.nombre','admin.apellido','bitacora_pcr.id_admin','identificador_bitacora'];

$table="folio_pcr";

$id= 'folio_pcr.id_folio';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER join bitacora_pcr on bitacora_pcr.id_folio=folio_pcr.id_folio INNER JOIN version_bitacora on version_bitacora.id_version_bitacora=folio_pcr.id_version_bitacora
LEFT JOIN admin on admin.id_admin=bitacora_pcr.id_admin";

$where = "WHERE folio_pcr.id_folio::text ILIKE '%" . $campo . "%' or bitacora_pcr.fecha::text ILIKE '%" . $campo . "%' and folio_pcr.id_folio ='$Folio' ";

$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

//Consulta de datos 
$sql="SELECT DISTINCT on (version_pcr)" . implode(", ",$columns) . "
FROM $table 
$join
$where ORDER BY version_pcr ASC
$sLimit ";

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
        if($row['id_admin']==''){
            $Eliminar='<a href="./php/Eliminar_Folio.php?No_FoloEliminar='. $row['id_folio']. '">Eliminar</a>';
        }else{
            $Eliminar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_folio'].'</td>';
        $output['data'].='<td>'. $row['version_pcr'].'</td>';
        $output['data'].='<td>'. $row['fecha_creacion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '. $row['apellido'].'</td>';
        $output['data'].='<td><a href="Ver_VersionPcr.php?Version_Vitacora='. $row['identificador_bitacora']. '">Ver</a></td>';
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