<?php
ob_start();
session_start();

if(isset($_GET['No_Folio'])){
    $_SESSION['Folio_VercionPcreal']=$_GET['No_Folio'];
}else{
    $_SESSION['Folio_VercionPcreal'];
}


$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ver_resul_timreal.css">
    <title>Ver Bitacora PCR</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>
    <section class="dat_result_pcr">
        <div class="dat_resul_contenedor">
            <form class="dat_resul_form">
                <div class="dat_resul_titulo">
                    <h1>Ver Versiónes Bitacora de Resultados de PCR tiempo Real</h1>
                    <div class="linea_titulo"></div>
                </div>
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
                            <label for="buscar">Buscar PCR Tiempo Real:</label>
                            <input type="text" id="campo" name="campo">
                        </div>
                    </div>
                    <table>
                        <thead>
                            <th>Folio</th>
                            <th>Versión</th>
                            <th>Fecha</th>
                            <th>Bitacora</th>
                            <th>Revisó</th>
                            <th>Ver Bitacora</th>
                            <?php if($_SESSION['Nivel']==2){ ?>
                                    <th>Revisado</th>
                            <?php  } ?>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
            </form>
            
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>
</html>

<script src="../js/heder.js"></script>
<script src="./js/Versiones_Anteriores.js"></script>

<?php }  ?>
