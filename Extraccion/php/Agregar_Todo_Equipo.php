//Prueba para agregar todos los equipos de un área (todavía no funciona)

<?php
require "../../php/conexion.php";
session_start();

$NoEquipo =$_SESSION['No_Foli'];
$Area=$_POST['Area_Select'];

$Buscar="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo';";
$querybuscar=pg_query($conexion,$Buscar);

if(pg_num_rows($querybuscar)!=0){
    echo 1;
    $Borrar="DELETE FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo';";
    pg_query($conexion,$Borrar);
    
    $BuscarEqupos="SELECT * FROM equipo where id_area = '$Area';";
    $queryequpo=pg_query($conexion,$BuscarEqupos);

    $Buscarmax="SELECT MAX(identificador) FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo';";
    $querymax=pg_query($conexion,$Buscarmax);
    $rowmax=pg_fetch_assoc($querymax);

    while($row=pg_fetch_assoc($queryequpo)){
        $Agregar="INSERT INTO public.equipo_extraccion(
            id_equipo_extraccion, identificador, id_equipo, version_equipo)
            VALUES ('$NoEquipo', '".$rowmax['max']+1 ."', '".$row['id_equipo']."', 1);";
        pg_query($conexion,$Agregar);
    }
    
}



?>