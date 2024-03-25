<?php
ob_start();
session_start();

$_SESSION["Reactivo"];
$_SESSION["VercionMax"];

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
    <link rel="stylesheet" href="css/alta_reactivos.css">
    <title>Actualizar Bitácora Reactivo</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css">
</head>

<body>
<?php require "../global/header.php" ;?>

    <section class="datos_alta">
        <div class="datos_alta_contenedor">
            <form class="datos_alta_form" id="Reactivos_Form_Data">
                <div class="datos_alta_titulo">
                    <h1>Actualizar Bitácora Reactivo</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat-datos">
                    <div class="datoo">
                        <div class="Reactivos_Datos">
                            <label for="dat1">Nombre del Reactivo:</label>
                            <select name="Reactivos_Select" id="Reactivos_Select"></select>
                        </div>
                        <div>
                            <label for="dat2">No Lote:</label>
                            <input type="text" name="Lote_Reactivo" id="Lote_Reactivo">
                        </div>
                    </div>

                    <div class="datoo">
                        <div>
                            <label for="dat3">Fecha Apertura:</label>
                            <input type="date" name="Apertura_Reactivo">
                        </div>
                        <div>
                            <label for="dat4">Fecha Caducidad:</label>
                            <input type="date" name="Caducidad_Reactivo" id="Caducidad_Reactivo">
                        </div>
                    </div>
                    <div class="datoo">
                        <div class="datoos">
                            <label for="dat5">Tipo Bitacora:</label>
                            <select id="Tipo_Select" name="Tipo_Bitacora"></select>
                        </div>
                        <div class="datoos">
                            <label for="dat5">Prueba de Reactivo:</label>
                            <select name="Folio_Reactivo" id="Bitaforas_Select"></select>
                        </div>
                    </div>
                    
                </div>

                <div class="botones">
                    <input type="button" value="Actualizar" id="Nuevo_Actualizar_Reactivo">
                    <input type="button" value="Ver Bitacoras Reactivo" id="Ver_Vitacora_Reactivos">
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
                            <label for="buscar">Buscar Reactivo:</label>
                            <input type="text" id="campo" name="campo">
                        </div>
                    </div>

                    <table>
                        <thead>
                            <th>Nombre Reactivo</th>
                            <th>Lote</th>
                            <th>Apertura</th>
                            <th>Caducidad</th>
                            <th>Prueba Reactivo</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/Alerta_Cerrar.php"  ?>
    <script src="../js/Script_Cerrar.js"></script>
    <?php require "../global/footer.php" ?>

</body>

</html>

<script src="./js/scripts.js"></script>
<script src="./js/Buscar_Reactivo.js"></script>
<script src="./js/Agregar_Reactivo_Vercion.js"></script>
<script src="./js/Buscar_Tabala_VercionNueva.js"></script>
<script src="./js/Buscar_Datos_Reactivos.js"></script>
<script src="../js/heder.js"></script>


<?php }  ?>