<?php
ob_start();
session_start();
if(isset($_GET['Version_Vitacora'])){
    $_SESSION["Version_Vitacora"]=$_GET['Version_Vitacora'];
}else{
    $_SESSION["Version_Vitacora"];
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/Vercion_Anterior.css" />
    <title>Bitacora de resultados PCR</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ?>

    <section class="dat_resul_pcr">
        <div class="dat_resul_contenedor">
            <div class="dat_resul_titulo">
                <h1>Bitacora de Resultados de PCR</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="dat_resul_form" id="Pcr_Form">
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
                            <input type="text" id="campo" name="campo" />
                        </div>
                    </div>

                    <table>
                        <thead>
                            <th>No. Registro</th>
                            <th>Analisis</th>
                            <th>Fecha</th>
                            <th>Sanitizo</th>
                            <th>Tiempo Uv</th>
                            <th>Resultado</th>
                            <th>Observaciones</th>
                            <th>Realizo</th>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
                <div class="dat_resul_titulo">
                    <h2>Equipo Seleccionado</h2>
                </div>
                <div class="Datos_Metodo_Equipo">
                    <table>
                        <thead>
                            <th>No. Equipo</th>
                            <th>Nombre Equipo</th>
                        </thead>
                        <tbody id="Equipo_Tabla"></tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/Alerta_Cerrar.php"  ?>
    <script src="../js/Script_Cerrar.js"></script>
    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="../js/heder.js"></script>
<script src="./js/Ver_Vercion_Anterior.js"></script>
<script src="./js/Equipo_Vercion_Anterior.js"></script>
<?php }  ?>