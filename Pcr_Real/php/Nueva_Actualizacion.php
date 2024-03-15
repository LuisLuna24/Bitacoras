<?php
require "../../php/conexion.php";
session_start();

$_SESSION["pcreal_fol"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$BuscarDatosMax="SELECT MAX(version_pcreal) FROM bitacora_pcreal where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);

$Versiondatos=$rowDatosmax['max'];
$VersionMax=$rowDatosmax['max']+1;

$BuscarPcreal="SELECT MAX(version_registro), id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, archivo, version_folio, version_registro, identificador_registro, id_especie_pcreal, version_especie_pcreal, no_especie_pcreal
FROM public.bitacora_pcreal where id_folio='$Folio' and version_pcreal='$Versiondatos' GROUP BY id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, archivo, version_folio, version_registro, identificador_registro, id_especie_pcreal, version_especie_pcreal, no_especie_pcreal;";
$queryPcr=pg_query($conexion,$BuscarPcreal);

$BuscarEspecie="SELECT * FROM especies_pcreal INNER JOIN bitacora_pcreal on bitacora_pcreal.id_especie_pcreal=especies_pcreal.id_especie_pcreal where id_folio='$Folio' and especies_pcreal.version_especie_pcreal='$Versiondatos'";
$queryEspecie=pg_query($conexion,$BuscarEspecie);
while($rowEspecie=pg_fetch_assoc($queryEspecie)){
    $VersionMax=$rowDatosmax['max']+1;

    $InsertarEspecie="INSERT INTO public.especies_pcreal(
        id_especie_pcreal, version_especie_pcreal, id_especie, version_especie, resultado, no_especie_pcr)
        VALUES ('" . $rowEspecie['id_especie_pcreal'] . "', $VersionMax, '" . $rowEspecie['id_especie'] . "', '" . $rowEspecie['version_especie'] . "', '" . $rowEspecie['resultado'] . "', '" . $rowEspecie['no_especie_pcr'] . "');";
    pg_query($conexion,$InsertarEspecie);

}

$BuscarEquipo="SELECT id_equipo_pcreal, identificador, id_equipo, version_equipo FROM public.equipo_pcreal where id_equipo_pcreal='$Folio' and version_equipo_pcr='$Versiondatos';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEqu=pg_fetch_assoc($queryEquipo)){
    //Buscar la version maxima del equipo 
    $equimax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo='" . $rowEqu['id_equipo'] . "';";
    $queryequimax=pg_query($conexion,$equimax);
    $rowequimax=pg_fetch_assoc($queryequimax);
    $vercionequimax=$rowequimax['max'];

    $Ver_Equipo=$Folio.$VersionMax;
    $InsertarEquipo="INSERT INTO public.equipo_pcreal(
	id_equipo_pcreal, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcreal)
	VALUES ('$Folio', '" . $rowEqu['identificador'] . "', '$VersionMax', '" . $rowEqu['id_equipo'] . "','" . $rowEqu['version_equipo'] . "' ,'$Ver_Equipo');";
    pg_query($conexion,$InsertarEquipo);
}





while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    
    if($row['id_especie_pcreal']==''){
        $D_Campos="";
        $D_CAmpos_Especie="";

    }else{
        $D_Campos=", id_especie_pcreal, version_especie_pcreal, no_especie_pcreal";
        $D_CAmpos_Especie=", '".$row['id_especie_pcreal']."', '$VersionMax', '".$row['no_especie_pcreal']."'";
    }


    $Identificador_Registro=$row['id_pcreal'].$row['no_registro'].$VersionMax.$Folio;
    $Insertar_Nuevo="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, version_folio, version_registro, identificador_registro ".$D_Campos.")
        VALUES ('".$row['id_pcreal']."', '".$row['no_registro']."', '$VersionMax', '".$row['identificador_bitacora']."', '".$row['id_folio']."', '".$row['id_analisi']."', '".$row['fecha']."', '".$row['sanitizo']."', '".$row['tiempouv']."', '".$row['resultado']."', '".$row['observaciones']."', '".$row['id_equipo_pcreal']."', '$VersionMax', '".$row['identificador_equipo']."', '".$row['id_usuaro']."', '".$row['version_folio']."', '".$row['version_registro']."', '".$row['identificador_registro']."' ".$D_CAmpos_Especie.");";
        pg_query($conexion,$Insertar_Nuevo);
}


$_SESSION["VercionMax"]=$VersionMax;
$_SESSION["EquipoMax"]=$VersionMax;

header("Location:../Actualizar_Pcreal.php");

?>