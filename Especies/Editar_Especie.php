<?php
ob_start();
session_start();

$_SESSION['Especie_Anterior']=$_GET['Especie'];

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
    <link rel="stylesheet" href="css/agregar_especie.css">
    <title>Editar Especie</title>
    <link rel="stylesheet" href="../css/header.css">
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css">
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>

    <section class="agregar_especie">
        <div class="agregar_especie_contenedor">
            <form class="agregar_especie_form" id="Especie_Form_edit">
                <div class="agregar_especie_titulo">
                    <h1>Editar Especie</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat_datos">
                <div class="dato">
                        <div>
                            <label for="nom" id="Nombre_Especie">Nombre:</label>
                        </div>
                    </div>
                    <div class="dato">
                        <div>
                            <label for="nom">Nombre:</label>
                            <input type="text" name="Nombre_Especie">
                        </div>
                    </div>
                    <div class="botones">
                        <input type="button" value="Editar Especie" id="Editar_Especie">
                        <input type="button" value="Cancelar" id="Cancelarbtn">
                    </div>
                </div>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/footer.php" ?>

</body>

</html>


<script src="js/scripts.js"></script>
<script src="js/Buscar_Especie_Version.js"></script>
<script src="js/Editar_Especie.js"></script>
<?php }  ?>