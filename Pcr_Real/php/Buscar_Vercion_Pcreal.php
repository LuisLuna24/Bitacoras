<?php
require "../../php/conexion.php";
session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION["pcreal_fol"];
}

$Vercion=$_SESSION["VercionMax"];

$columns=['id_pcreal', 'no_registro', 'version_pcreal', 'identificador', 'id_folio', 'birtacora_pcreal.id_analisis','analisis.nombre as analisis_nombre' ,'fecha', 'sanitizo', 'tiempouv', 'resultado', 'observaciones', 'id_equipo_pcreal', 'id_usuario',];

$table="birtacora_pcreal ";

$id= 'id_pcreal';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN analisis on analisis.id_analisis=birtacora_pcreal.id_analisis ";

$where = "WHERE identificador::text ILIKE '%" . $campo . "%' and id_folio = '$Folio' and version_pcreal='$Vercion' ";


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
    while($row=pg_fetch_array($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['no_registro'] .'-'.$row['identificador'].'</td>';
        $output['data'].='<td>'. $row['analisis_nombre'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['sanitizo'] .'</td>';
        $output['data'].='<td>'. $row['tiempouv'] .'</td>';
        $output['data'].='<td>'. $row['resultado'] .'</td>';
        $output['data'].='<td>'. $row['observaciones'] .'</td>';
        $output['data'].='<td><a href="./php/Eliminar_pcreal.php?No_nombre='. $row['identificador']. '">Eliminar</a></td>';
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