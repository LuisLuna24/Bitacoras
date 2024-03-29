<?php
require "../../php/conexion.php";
session_start();


//Visualizar tabla de nuevo registro en bitacora de Reactivos

//folio de bitacora
$folio=$_SESSION['No_FoliRec'];
//Columnas a consultar
$columns=['id_bitacora_reactivo', 'version_bitacora_reactivo', 'identificador', 'id_folio', 'no_lote', 'fecha_apertura', 'bitacora_reactivos.fecha_caducidad',' id_folio_bitacora', 'id_usuario', 'id_admin','reactivos.id_reactivo,reactivos.nombre','nombre_version','bitacora_reactivos.id_version_bitacora'];
//tabla a consultar 
$table="bitacora_reactivos";
//Dato que se contara para conte para paginacion
$id= 'id_bitacora_reactivo';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

//Consulta Join aqui van todos los JOINSs
$join ="INNER JOIN reactivos on reactivos.id_reactivo=bitacora_reactivos.id_reactivo INNER JOIN version_bitacora on version_bitacora.id_version_bitacora=bitacora_reactivos.version_bitacora_reactivo";
//consulta where aqui van todos los where
$where = "WHERE reactivos.nombre ILIKE '%" . $campo . "%' and id_folio = '$folio'";

//Limite dependiendo del selectt de que permite visualizar
$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

//Consulta general para obtenber valores de tabla
$sql="SELECT " . implode(", ",$columns) . "
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
$Tipo_Bitacora='';

//Donde se muestra los datos de la tabla apartir de la consulta
if($num_rows>0){
    while($row=pg_fetch_assoc($resultado)){
        if($row['id_version_bitacora']==1){
            $Tipo_Bitacora='BBM/GIS/BE 13-04';
        }else if($row['id_version_bitacora']==2){
            $Tipo_Bitacora='BBM/GIS/E05';
        }else if($row['id_version_bitacora']==3){
            $Tipo_Bitacora='BBM/GIS/RqPCR08-03';
        }

        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['no_lote'] .'</td>';
        $output['data'].='<td>'. $row['fecha_apertura'] .'</td>';
        $output['data'].='<td>'. $row['fecha_caducidad'] .'</td>';
        $output['data'].='<td>'. $Tipo_Bitacora.' Folio:'.$row['id_folio_bitacora'] .'</td>';
        $output['data'].='<td><a href="./php/Eliminar_Reactivo.php?identificado='.$row['id_bitacora_reactivo'].'">Eliminar</a></td>';
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