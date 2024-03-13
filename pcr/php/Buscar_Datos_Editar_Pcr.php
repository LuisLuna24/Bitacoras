<?php
//Buscar los datos del equipo a actualizar y mandarlos en JSON

require "../../php/conexion.php";
session_start();

$Registro_Pcr=$_SESSION['Registro_Pcr'];

$Buscar="SELECT distinct id_pcr , MAX(version_pcr), version_pcr, no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, archivo, id_especes_pcr, version_especies_pcr, no_especie_pcr, id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario, id_admin, fecha_creacion, fecha_modificacion
        FROM public.bitacoras_pcr where id_pcr='$Registro_Pcr' GROUP BY id_pcr, version_pcr, no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, archivo, id_especes_pcr, version_especies_pcr, no_especie_pcr, id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario, id_admin, fecha_creacion, fecha_modificacion
        ORDER BY id_pcr,version_pcr DESC;";
$query=pg_query($conexion,$Buscar);

//Obtener el array de los datos del equipo
$output=[];
$row=pg_fetch_assoc($query);
if(pg_num_rows($query)>0){
    $row=pg_fetch_assoc($query);
    $id_especie_pcr=$row['id_especes_pcr'];
    $id_equipo_pcr=$row['id_equipo_pcr'];
    $output['no_registro']=$row['no_registro'];
    $output['id_analisis']=$row['id_analisis'];
    $output['fecha']=$row['fecha'];
    $output['agarosa']=$row['agarosa'];
    $output['voltage']=$row['voltage'];
    $output['tiempo']=$row['tiempo'];
    $output['sanitizo']=$row['sanitizo'];
    $output['tiempouv']=$row['tiempouv'];

    echo json_encode($output, JSON_UNESCAPED_UNICODE);

}

$queryNuevaEspeciesVer=pg_query($conexion,"SELECT * FROM especies_pcr where id_especie_pcr::text='".$row['id_especes_pcr']."' and version_especie_pcr='" . $row['max']+1 . "'");
if(pg_num_rows($queryNuevaEspeciesVer)==0){
    $queryNuevaEspecies=pg_query($conexion,"SELECT MAX(version_especie_pcr),id_especie_pcr,no_especie_pcr,id_especie,version_especie,resultado FROM especies_pcr where id_especie_pcr::text='$id_especie_pcr' GROUP BY id_especie_pcr,no_especie_pcr,id_especie,version_especie,resultado;");
    while($rowEspecies=pg_fetch_array($queryNuevaEspecies)){
        $VersionEspecie=$rowEspecies['max']+1;
        $_SESSION['VersionEspecie']=$VersionEspecie;
        $InsertarEspecies="INSERT INTO public.especies_pcr(
            id_especie_pcr, version_especie_pcr, no_especie_pcr, id_especie, version_especie, resultado)
            VALUES ('".$rowEspecies['id_especie_pcr']."','$VersionEspecie', '".$rowEspecies['no_especie_pcr']."', '".$rowEspecies['id_especie']."', '".$rowEspecies['version_especie']."', '".$rowEspecies['resultado']."');";
        pg_query($conexion,$InsertarEspecies);
    }
}

$queryNuevaEquipossVer=pg_query($conexion,"SELECT * FROM equipos_pcr where id_equipo_pcr::text='".$row['id_equipo_pcr']."' and version_equipo_pcr='" . $row['max']+1 ."';");
if(pg_num_rows($queryNuevaEquipossVer)==0){
    $queryNuevaEquipos=pg_query($conexion,"SELECT MAX(version_equipo_pcr),id_equipo_pcr,no_equipo_pcr,id_equipo,version_equipo FROM equipos_pcr where id_equipo_pcr::text='$id_equipo_pcr' GROUP BY id_equipo_pcr,no_equipo_pcr,id_equipo,version_equipo;");
    while($rowEquipo=pg_fetch_array($queryNuevaEquipos)){
        $VersionEquipo=$rowEquipo['max']+1;
        $_SESSION['VersionEquipo']=$VersionEquipo;
        $InsertarEquipo="INSERT INTO public.equipos_pcr(
            id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_equipo, version_equipo)
            VALUES ('".$rowEquipo['id_equipo_pcr']."', '$VersionEquipo', '".$rowEquipo['no_equipo_pcr']."', '".$rowEquipo['id_equipo']."', '".$rowEquipo['version_equipo']."');";
        pg_query($conexion,$InsertarEquipo);
    }
}


?>