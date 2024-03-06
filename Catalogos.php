<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
$_SESSION['Nivel'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.php");
}else if($_SESSION['Nivel']==2){  ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Alerta_Cerrar.css">
    <title>Principal</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/Catalogos.css">
</head>

<body>
    <?php require "./global/header.php"  ?>

    <section class="Cabesera">
        <div class="Cabecera_Contenedor">
            <div class="Cabecera_Titulo">
                <h1>Bienvenido</h1>
                <h2>
                    <?php echo $Nombre." ".$Apellido  ?>
                </h2>
                <p>Menú de Catálogos</p>
            </div>
        </div>
    </section>

    <div class="custom-shape-divider-top-1700880565">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>


    <section class="dat_men_catalogo">
        <div class="dat_men_catalogo_contenedor">
            <form class="dat_men_catalogo_form">
                <div class="dat_datos">
                    <div class="dato">

                        <div class="card">
                            <h2>Análisis</h2>
                            <p class="description">Ver, editar, agregar Análisis</a>. </p>
                            <div class="Card_Boton">
                                <a href="./Analisis/Analisis.php" class="entrar">
                                    Entrar
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <h2>Métodos</h2>
                            <p class="description">Ver, editar, agregar Métodos</a>. </p>
                            <div class="Card_Boton">
                                <a href="./Metodos/Metodos.php" class="entrar">
                                    Entrar
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <h2>Especie</h2>
                            <p class="description">Ver, editar, agregar Especie</a>. </p>
                            <div class="Card_Boton">
                                <a href="./Especies/Especies.php" class="entrar">
                                    Entrar
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php require "./global/Alerta_Cerrar.php"  ?>
    <script src="js/Script_Cerrar.js"></script>
    <?php require "./global/footer.php"  ?>
</body>

</html>


<?php }else {
    header("location:Bitacoras.php");
}  ?>