<?php
ob_start();
session_start();

$_SESSION['Reactivo']=$_GET['Reactivo'];


$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Actualizar_Reactivo.css">
    <title>Editar Reactivo</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css">
</head>
<body>
    <?php require "../global/header.php" ;?>

    <section class="Editar">
        <div class="Editar_Contenedor">
            <div class="Contenedor_Titulo">
                <h1>Editar Reactivo</h1>
            </div>
            <form class="Editar_Form">
                <div class="Datos_Form">
                    <div class="datos">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre">
                    </div>
                    <div class="datos">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion">
                    </div>
                </div>
                <div class="Datos_Form">
                    <div class="datos">
                        <label for="no_lote">No Serie</label>
                        <input type="text" name="no_lote" id="no_lote">
                    </div>
                    <div class="datos">
                        <label for="abreviatura">Abreviatura</label>
                        <input type="text" name="abreviatura" id="abreviatura">
                    </div>
                </div>
                <div class=Editar_Botones>
                    <input type="button" value="Actualizar">
                    <input type="button" value="Cancelar">
                </div>
            </form>
        </div>
    </section>

    <?php require "../global/footer.php" ;?>
</body>
</html>

<script src="./js/scripts.js"></script>
<script src="./js/Actualizar_Reactivo.js"></script>

<?php }  ?>
