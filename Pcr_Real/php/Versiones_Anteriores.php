<?php
require "../../php/conexion.php";

//Permite ber registros de verciones ateriores de un folio

session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION['Folio_VercionPcreal'];
}


$columns=['bitacora_pcreal.id_admin','usuario.apellido','usuario.nombre','version_pcreal', 'identificador_bitacora', 'bitacora_pcreal.id_folio','fecha_creacion','version_bitacora.nombre_version'];

$table="bitacora_pcreal ";

$id= 'version_pcreal';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN folio_pcreal on folio_pcreal.id_folio=bitacora_pcreal.id_folio 
INNER JOIN version_bitacora on version_bitacora.id_vercion_bitacora=folio_pcreal.id_version_bitacora
LEFT JOIN usuario on usuario.id_usuario = bitacora_pcreal.id_admin";

$where = "WHERE bitacora_pcreal.id_folio::text ILIKE '%" . $campo . "%' and bitacora_pcreal.id_folio = '$Folio'  ";


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

$sqlTotal="SELECT count(DISTINCT $id) FROM $table ";
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
        $output['data'].='<td>'. $row['id_folio'] .'</td>';
        $output['data'].='<td>'. $row['version_pcreal'] .'</td>';
        $output['data'].='<td>'. $row['fecha_creacion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] . " " . $row['apellido'] .'</td>';
        $output['data'].='<td><a href="./Ver_VersionPcreal.php?Version_Vitacora='. $row['identificador_bitacora']. '">Ver</a></td>';
        $output['data'].='<td>'. $Validar. '</td>';
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