<?php
require "../../php/conexion.php";
session_start();
//Permite ver la tabla paginada de la seccion Ver Reactivos 


//Folio a consultar
$Folio=$_SESSION["Folio_Reactivo"];
//Columnas que se desea Consultar
$columns=[ 'nombre_version','admin.nombre','admin.apellido','id_bitacora_reactivo', 'version_bitacora_reactivo', 'identificador', 'bitacora_reactivos.id_folio', 'fecha_elaboracion','no_lote', 'fecha_apertura', 'fecha_caducidad', 'id_folio_bitacora', 'id_usuario', 'admin.id_admin', 'id_reactivo',' version_bitacora.id_version_bitacora', 'version_bitacora.version_bitacora'];
//Tabla que se desea consultar 
$table="bitacora_reactivos";
//Conteo para paginacion
$id= 'id_bitacora_reactivo';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="LEFT JOIN version_bitacora on version_bitacora.id_version_bitacora = bitacora_reactivos.id_version_bitacora LEFT JOIN admin on admin.id_admin = bitacora_reactivos.id_admin";

$where = "WHERE nombre_version ILIKE '%" . $campo . "%'  AND bitacora_reactivos.id_folio=" . $Folio . "";

$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

$sql="SELECT DISTINCT " . implode(", ",$columns) . "
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
    while($row=pg_fetch_assoc($resultado)){
        if($row['id_admin']==''){
            $Eliminar='<a href="./php/Eliminar_VerReactivo.php?No_Folio='. $row['id_folio']. '">Eliminar</a>';
        }else{
            $Eliminar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['version_bitacora_reactivo'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .' Folio:'.$row['id_folio'] .'</td>';
        $output['data'].='<td>'. $row['fecha_elaboracion'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '.$row['apellido'] .'</td>';
        $output['data'].='<td><a href="Version_Reactivo.php?No_Folio='.$row['id_folio'].'">Ver</a></td>';
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
            $output['paginacion'].='<li class="Pagina"><a class="page-link activo" href="#">' . $i . '</a></li>';

        }else{
            $output['paginacion'].='<li class="Pagina"><a class="page-link" href="#" onclick="getData('. $i .')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'].='</ul">';
    $output['paginacion'].='</nav>';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);




?>