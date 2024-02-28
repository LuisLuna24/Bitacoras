<?php
ob_start();
session_start();

if(isset($_GET['No_Folio'])){
    $_SESSION['No_Folio']=$_GET['No_Folio'];
}else{
    $_SESSION['No_Folio'];
}


$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Extraccion</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="css/ver_extraccion.css">
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css">
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>
    <section class="Extraccion">
        <div class=Extraccion_Contenedor>
            <div class="Extraccion_Titulo">
                <h1>Ver Versiones Extracción</h1>
                <div class="linea_titulo"></div>
            </div>
        </div>
        <div class="Todas_las_Extracciones">
            <div class="Equipo_Tabla">
                <div class="Acciones_Tabla">
                    <div class="Datos">
                        <label for="">Mostrar:</label>
                        <select name="num_registros" id="num_registros">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="Dato">
                        <label for="buscar">Buscar Extraccion:</label>
                        <input type="text" id="campo" name="campo">
                    </div>
                </div>
                
                <table>
                    <thead>
                        <th>Folio</th>
                        <th>Vercion</th>
                        <th>Bitacora</th>
                        <th>Revisó</th>
                        <th>Ver Vercion</th>
                        <?php if($_SESSION['Nivel']==2){ ?>
                                <th>Revisado</th>
                        <?php  } ?>
                    </thead>
                    <tbody id="content"></tbody>
                </table>
                <div class="Tablas_Paginas" id="nav-paginacion"></div>
            </div>
        </div>
    </section>

    <?php require "../global/footer.php" ?>
</body>
</html>

<script src="../js/heder.js"></script>
<script src="./js/Ver_Vercion_Anterior.js"></script>

<?php }  ?>