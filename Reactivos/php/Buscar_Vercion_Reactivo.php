<?php
require "../../php/conexion.php";
session_start();

//Permite ver la tabla paginada de la seccion Ver Reactivos 
$VersionFolio=$_SESSION["Folio_Reactivo"];
//Columnas que se desea Consultar
$columns=['nombre_version','nombre','apellido','fecha_creacion','version_bit_reactivo','id_bit_reactivo', 'version_bit_reactivo', 'no_reactivo', 'identificador_bitacora', 'folio_reactivo.id_folio', 'folio_reactivo.version_folio', 'id_reactivo', 'version_reactivo', 'fecha_apertura', 'fecha_caducidad', 'folio_bitacora', 'folio_reactivo.id_version_bitacora', 'folio_reactivo.version_bitacora', 'bitacora_reactivos.id_admin'];
//Tabla que se desea consultar 
$table="folio_reactivo";
//Conteo para paginacion
$id= 'id_folio';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN bitacora_reactivos on bitacora_reactivos.id_folio = folio_reactivo.id_folio
        LEFT JOIN usuario on usuario.id_usuario=bitacora_reactivos.id_admin
        INNER JOIN version_bitacora on version_bitacora.id_vercion_bitacora =folio_reactivo.id_version_bitacora";

$where = "WHERE folio_reactivo.id_folio::text ILIKE '%" . $campo . "%' OR fecha_creacion::text ILIKE '%" . $campo . "%' and folio_reactivo.id_folio='$VersionFolio'";

$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

$sql="SELECT DISTINCT on (version_bit_reactivo) " . implode(", ",$columns) . "
FROM $table
$join
$where ORDER BY version_bit_reactivo ASC
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
        if($_SESSION['Nivel']==2){
            $Validar='<a href="./php/Validar_folio.php?Validar='. $row['identificador_bitacora']. '">Validar</a>';
        }else{
            $Validar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['version_bit_reactivo'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .' Folio:'.$row['folio_bitacora'] .'</td>';
        $output['data'].='<td>'. $row['fecha_creacion'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '.$row['apellido'] .'</td>';
        $output['data'].='<td><a href="Version_Reactivo.php?Bitacora='.$row['identificador_bitacora'].'">Ver</a></td>';
        $output['data'].='<td>'. $Validar .'</td>';
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