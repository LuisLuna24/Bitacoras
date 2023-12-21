<?php
require "../../php/conexion.php";
session_start();

$folio=$_SESSION['No_FoliRec'];

$columns=['id_bit_reactivo', 'id_folio', 'reacivos.id_reactivo',' bitacora_reactivos.no_lote', 'fecha_apertura', 'fecha_caducidad', 'folio_bitacora', 'id_usuario','reacivos.nombre','nombre_version'];

$table="bitacora_reactivos";

$id= 'id_bit_reactivo';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join ="INNER JOIN reacivos on reacivos.id_reactivo=bitacora_reactivos.id_reactivo INNER JOIN version_bitacora on version_bitacora.id_version=bitacora_reactivos.tipo_bitacora";

$where = "WHERE reacivos.nombre ILIKE '%" . $campo . "%' and id_folio = '$folio'";


$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT " . implode(", ",$columns) . "
FROM $table
$join
$where
$sLimit";

$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

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
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['no_lote'] .'</td>';
        $output['data'].='<td>'. $row['fecha_apertura'] .'</td>';
        $output['data'].='<td>'. $row['fecha_caducidad'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'].'  ' .'Folio:'.$row['folio_bitacora'] .'</td>';
        $output['data'].='<td><a href="./Ediatar_BitReactivo.php?identificador='.$row['id_bit_reactivo'].'">Editar</a></td>';
        $output['data'].='<td><a href="./php/Eliminar_Reactivo.php?identificado='.$row['id_bit_reactivo'].'">Eliminar</a></td>';
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