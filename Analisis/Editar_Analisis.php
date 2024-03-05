<?php
ob_start();
session_start();

$_SESSION['Analisis']=$_GET['Analisis'];

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else if($_SESSION['Nivel']==2){   ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/agregar_analisis.css" />
    <title>Agregar Analisis</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ?>

    <section class="dat_agrega_analisis">
        <div class="dat_agrega_analisis_contenedor">
            <form class="dat_agrega_analisis_form" id="Actualizar_Form">
                <div class="dat_agrega_analisis_titulo">
                    <h1>Actualizar Analisis</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat_datos">
                    <div class="dato">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="Editar_Nombre" id="Editar_Nombre">
                        </div>
                        <div>
                        <label for="abrev">Abreviatura:</label>
                        <input type="text" name="Editar_Abrebiatura" id="Editar_Abrebiatura">
                    </div>
                    </div>
                </div>
                <div class="botones">
                    <input type="button" value="Actualizar" id="Actualizarbtn_Analisis">
                    <input type="button" value="Salir" id="Salir_Actualizar">
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="../js/heder.js"></script>
<script src="./js/Buscar_Actualizar_Analisis.js"></script>
<script src="./js/Actualizar_Reactivo.js"></script>
<script src="js/scripts.js"></script>

<?php }else {
    header("location:../Bitacoras.php");
}  ?>
