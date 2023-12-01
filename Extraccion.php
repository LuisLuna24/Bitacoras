<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.html");
}else{  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extraccion</title>
    <link rel="stylesheet" href="css/header.css">
    <script src="librerias/jquery/jquery-3.2.1.min.js"></script>
    <script src="./librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
</head>
<body>
    <?php require "./Global/header.php"; ?>


    <footer calss="Footer">
        <div class="Fotter_Contenedor">
            <div class="Footer_Logo">
                <img src="img/Smallfooterlogo.webp" alt="">
                <label for="Copyright">Gisenalabs® Todos los derechos reservados</label>
            </div>
        </div>
    </footer>
</body>
</html>

<?php  } ?>