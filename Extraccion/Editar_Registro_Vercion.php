<?php
ob_start();
session_start();

if(isset($_GET['RegistroExtraN'])){
    $_SESSION['RegistroExtraN']=$_GET['RegistroExtraN'];
}else{
    $_SESSION['RegistroExtraN'];
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/extraccion.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css">
</head>

<body>
    <?php require "../global/header.php" ;?>
    <section class="bit_extraccion">
        <div class="bit_extraccion_contenedor">
            <form class="bit_extraccion_form" id="Form_Extraccion">
                <div class="bit_extraccion_titulo">
                    <h1>Bitacora de Extraccion</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="extraccion_datos">
                    <div class="datos_extraccion">
                        <div class="dato">
                            <div>
                                <label for="ext">No.Registro:</label>
                                <input type="text" name="Registro_Exteracion" id="Registro_Exteracion">
                            </div>
                        </div>

                        <div class="dato">
                            <label for="dato2">Fecha de extraccion:</label>
                            <input type="date" name="Fecha_Exteracion" id="Fecha_Exteracion">
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato">
                            <label for="">Metodo utilizado:</label>
                            <select name="Metodo_Exteracion" id="metodo_select"></select>
                        </div>
                        <div class="dato">
                            <label for="dato6">Analisis:</label>
                            <select name="Analisis_Select" id="Analisis_Select"></select>
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato">
                            <label for="dato7">Area:</label>
                            <select name="Area_Select" id="Area_Select"></select>

                        </div>

                        <div class="dato10">
                            <label for="dato10">Conc ng/ul:</label>
                            <input type="text" name="Conc_Exteracion" id="Conc_Exteracion">
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato11">
                            <label for="dato11">Dato 260/280:</label>
                            <input type="text" name="280_Exteracion" id="280_Exteracion">
                        </div>
                        <div class="dato12">
                            <label for="dato12">Dato 260/230:</label>
                            <input type="text" name="230_Exteracion" id="230_Exteracion">
                        </div>
                    </div>
                </div>
                <div class="botones">
                    <input type="submit" value="Actualizar Extraccion" id="Actualizar_Registro_nuevo">
                    <input type="button" value="Cancelar" id="Cancelar_Edicion">
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="js/Buscar_Registro.js"></script>
<script src="js/Buscar_Datos.js"></script>
<script src="../js/heder.js"></script>
<?php }  ?>