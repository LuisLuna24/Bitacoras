<?php
ob_start();
session_start();

$_SESSION['identificador']=$_GET['identificador'];

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alta_reactivos.css">
    <title>Editar Reactivo</title>
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
            <div class="datos_alta_titulo">
                <h1>Bitacora Reactivos</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="Editar_Form" id="Editar_Form">
                <div class="dat-datos">
                    <div class="datoo">
                        <div class="Reactivos_Datos">
                            <label for="dat1">Nombre del Reactivo:</label>
                            <select name="Reactivos_Select" id="Reactivos_Select2"></select>
                        </div>
                        <div>
                            <label for="dat2">No Lote:</label>
                            <input type="text" name="Lote_Reactivo" id="Lote_Reactivo">
                        </div>
                    </div>

                    <div class="datoo">
                        <div>
                            <label for="dat3">Fecha Apertura:</label>
                            <input type="date" name="Apertura_Reactivo" id="Apertura_Reactivo">
                        </div>
                        <div>
                            <label for="dat4">Fecha Caducidad:</label>
                            <input type="date" name="Caducidad_Reactivo" id="Caducidad_Reactivo">
                        </div>
                    </div>
                </div>
                <div class="botones">
                    <input type="button" value="Agregar" id="Actualizar_Reactivo">
                    <input type="button" value="Cancelar">
                </div>
            </form>
        </div>
    </section>

    <?php require "../global/footer.php" ;?>
</body>
</html>


<script src="./js/scripts.js"></script>
<script src="./js/Mostrar_Reactivo.js"></script>


<?php  } ?>