<?php
require "../../php/conexion.php";
session_start();

//Permite visualizar la tabla de nuevo registro de pcr

$Folio=$_SESSION["No_Folio_Ver"];
$RegistroPcr=$_SESSION['RegistroPcr'];



$columns=['nombre_usuario','apellido','version_registro','id_pcr','analisis.nombre','id_especie_pcr','archivo','id_pcr', 'no_registro', 'version_pcr', 'identificador_bitacora', 'id_folio', 'bitacora_pcr.id_analisis', 'fecha', 'agarosa', 'voltage', 'tiempo', 'sanitizo',' tiempouv',  'resultado', 'id_equipo_pcr', 'bitacora_pcr.id_usuario', 'id_admin'];

$table="bitacora_pcr ";

$id= 'id_pcr';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN analisis on analisis.id_analisis=bitacora_pcr.id_analisis
INNER JOIN usuario on usuario.id_usuario = bitacora_pcr.id_usuario";

$where = "WHERE id_pcr::text ILIKE '%" . $campo . "%' and identificador_bitacora='$RegistroPcr'";


$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT usuario.nombre AS " . implode(", ",$columns) . "
FROM $table 
$join
$where GROUP BY " . implode(", ",$columns) . " ORDER BY id_pcr DESC , version_registro DESC
$sLimit";


$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registross

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
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['no_registro'] .'-'.$row['id_pcr'].'</td>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['agarosa'] .'</td>';
        $output['data'].='<td>'. $row['voltage'] .'</td>';
        $output['data'].='<td>'. $row['tiempo'] .'</td>';
        $output['data'].='<td>'. $row['id_especie_pcr'] .'</td>';
        $output['data'].='<td>'. $row['resultado'] .'</td>';
        $output['data'].='<td>'. $row['nombre_usuario'] . $row['apellido'] .'</td>';
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