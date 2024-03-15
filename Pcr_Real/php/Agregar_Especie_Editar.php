<?php
require "../../php/conexion.php";
session_start();

$No_Registro=$_POST["Nombre"];
$_SESSION['No_registro_Especie_pcr']=$No_Registro;
$Cantidad=$_POST["Cantidad"];
$Resultado=$_POST["Resultado_Select"];
$Especie=$_POST["Especie_Select"];

$Folio=$_SESSION['pcreal_fol'];


//Buscar la vesion maxima de la especie seleecionada 
$BuscraEspecie="SELECT MAX(vercion_especie) FROM especie where id_especie='$Especie';";
$query=pg_query($conexion,$BuscraEspecie);
$row=pg_fetch_assoc($query);
$versionid= $row['max'];

//Buscar si la especie y existe en el registros
$id_especie_real=$Folio.$No_Registro.'1';
$VersionMax=$_SESSION["EquipoMax"];


$BuscarEspecieReg="SELECT * FROM public.especies_pcreal where id_especie='$Especie' and id_especie_pcreal::text='$id_especie_real';";
$Espquery=pg_query($conexion,$BuscarEspecieReg);
if(pg_num_rows($Espquery)==0){
    for($i=0;$i<$Cantidad;$i++){
        $id_especie_pcreal=$Folio.$No_Registro.$i+1;
    
        $queryNo=pg_query($conexion,"SELECT MAX(no_especie_pcr) FROM especies_pcreal WHERE id_especie_pcreal='$id_especie_pcreal';");
        $rowNo=pg_fetch_assoc($queryNo);
        $No_especie_pcreal=$rowNo['max']+1;

        $Insertar="INSERT INTO public.especies_pcreal(
            id_especie_pcreal, version_especie_pcreal, id_especie, version_especie, resultado,no_especie_pcr)
            VALUES ('$id_especie_pcreal', '$VersionMax', '$Especie', '$versionid', '$Resultado','$No_especie_pcreal');";
            pg_query($conexion,$Insertar);
    }
    echo 1;
}else{
    echo 2;
}

?>