<?php
require "../../php/conexion.php";
session_start();

$No_Registro=$_POST["Nombre"];
$_SESSION['No_registro_Especie_pcr']=$No_Registro;


$Resultado=$_POST["Resultado_Select"];
$Especie=$_POST["Especie_Select"];

$Folio=$_SESSION['pcreal_fol'];


//Buscar la vesion maxima de la especie seleecionada 
$BuscraEspecie="SELECT MAX(vercion_especie) FROM especie where id_especie='$Especie';";
$query=pg_query($conexion,$BuscraEspecie);
$row=pg_fetch_assoc($query);
$versionid= $row['max'];

$BuscarRegsitro="SELECT no_registro FROM public.especies_pcreal INNER JOIN bitacora_pcreal on bitacora_pcreal.id_especie_pcreal = especies_pcreal.id_especie_pcreal where id_pcreal::text='$No_Registro'
GROUP BY no_registro;";
$Espquery=pg_query($conexion,$BuscarRegsitro);
$rowReg=pg_fetch_assoc($Espquery);

$Registro=$rowReg['no_registro'];

//Buscar si la especie y existe en el registros

$BuscarEspecieReg="SELECT * FROM public.especies_pcreal INNER JOIN bitacora_pcreal on bitacora_pcreal.id_especie_pcreal = especies_pcreal.id_especie_pcreal where id_especie='$Especie' and id_pcreal::text='$No_Registro' ORDER BY no_especie_pcr ASC;";
$Espquery=pg_query($conexion,$BuscarEspecieReg);
$id_especie_pcreal=$Folio.$No_Registro.$Registro;

if(pg_num_rows($Espquery)==0){
        $id_especie_pcreal=$Folio.$No_Registro.$Registro;
        $Insertar="INSERT INTO public.especies_pcreal(
            id_especie_pcreal, version_especie_pcreal, id_especie, version_especie, resultado,no_especie_pcr)
            VALUES ('$id_especie_pcreal', '1', '$Especie', '$versionid', '$Resultado','');";
            pg_query($conexion,$Insertar);
    echo 1;
}else{
    $Actualizar="UPDATE public.especies_pcreal
	SET  resultado='$Resultado'
	WHERE id_especie_pcreal='$id_especie_pcreal' and id_especie='$Especie';";
    pg_query($conexion,$Actualizar);
    echo 2;
}

?>