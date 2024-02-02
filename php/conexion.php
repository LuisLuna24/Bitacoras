<?php 

//Conecion a base de datos
try {
    $host = 'localhost';
    $user = 'postgres';
    $password = 'Hmcnjsa1*.';
    $dbname = 'pruebabitacoras';

    $conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$conexion) {
        die("Error al conectar a la base de datos");
    }
}catch(ErrorException $e) {
    $host = 'localhost';
    $user = 'postgres';
    $password = 'Integral3na2016';
    $dbname = 'pruebabitacoras';

    $conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$conexion) {
        die("Error al conectar a la base de datos");
    }
}

?>