<?php
require "../../php/conexion.php";
session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION["pcreal_fol"];
}


$columns=['analisis.nombre','id_pcreal', 'no_registro',' version_pcreal','identificador_registro',' identificador_bitacora', 'id_folio', 'id_analisi', 'fecha', 'sanitizo', 'tiempouv', 'resultado', 'observaciones','id_usuaro', 'archivo', 'version_folio'];

$table="bitacora_pcreal ";

$id= 'id_pcreal';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN analisis on analisis.id_analisis=bitacora_pcreal.id_analisi ";

$where = "WHERE id_pcreal::text ILIKE '%" . $campo . "%' and id_folio = '$Folio'  ";


$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT DISTINCT on (id_pcreal,no_registro) " . implode(", ",$columns) . "
FROM $table 
$join
$where ORDER BY id_pcreal,no_registro,identificador_registro DESC, version_registro DESC
$sLimit";


$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

//Consulta para total registros

$sqlTotal="SELECT count($id) FROM $table WHERE id_folio='$Folio'";
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
        $output['data'].='<td>'. $row['id_pcreal'] .'-'.$row['no_registro'].'</td>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['sanitizo'] .'</td>';
        $output['data'].='<td>'. $row['tiempouv'] .'</td>';
        $output['data'].='<td>'. $row['resultado'] .'</td>';
        $output['data'].='<td>'. $row['observaciones'] .'</td>';
        $output['data'].='<td><a href="./Editar_Registro_Pcreal.php?Registro_Pcreal='. $row['identificador_registro']. '">Editar</a></td>';
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