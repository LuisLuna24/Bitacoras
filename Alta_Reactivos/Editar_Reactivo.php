<?php
ob_start();
session_start();

$_SESSION['Reactivo']=$_GET['Reactivo'];


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
    <link rel="stylesheet" href="./css/Actualizar_Reactivo.css" />
    <link rel="stylesheet" href="css/alta_reactivos.css">

    <title>Editar Reactivo</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css" />
</head>

<body>
    <?php require "../global/header.php" ;?>

    <section class="Editar">
        <div class="Editar_Contenedor">
            <div class="Contenedor_Titulo">
                <h1>Editar Reactivo</h1>
            </div>
            <div class="linea_titulo"></div>
            <form class="Editar_Form" id="Actualizar_Form">
                <div class="dat-datos">
                    <div class="datoo">
                        <div>
                            <label for="dat1">Nombre del Reactivo:</label>
                            <input type="text" name="Reacivo_Nombre" id="Reacivo_Nombre" >
                        </div>
                        <div>
                            <label for="dat5">Lote:</label>
                            <input type="text" name="Reactivo_Lote" id="Reactivo_Lote">
                        </div>
                    </div>

                    <div class="datoo">
                        <div>
                            <label for="dat5">Descripcion:</label>
                            <input type="text" name="Reactivo_Descripcion" id="Reactivo_Descripcion">
                        </div>

                        <div>
                            <label for="dat4">Cantidad:</label>
                            <input type="text" name="Reactivo_Cantidad" id="Reactivo_Cantidad">
                        </div>
                    </div>
                    <div class="datoo">
                        <div>
                            <label for="dat4">Fecha Caducidad:</label>
                            <input type="Date" name="Reactivo_Caducidad" id="Reactivo_Caducidad">
                        </div>
                    </div>
                </div>
                <div class="Editar_Botones">
                    <input type="button" value="Actualizar" id="Actualizarbtn">
                    <input type="button" value="Cancelar" id="Cancelarbtnm">
                </div>
            </form>
        </div>
    </section>

    <?php require "../global/footer.php" ;?>
</body>

</html>

<script src="./js/Buscar_Actualizar_reactivo.js"></script>
<script src="./js/Actualizar_Reactivo.js"></script>
<script src="../js/heder.js"></script>

<?php }  ?>