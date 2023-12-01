<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.html");
}else{  ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extraccion</title>
    <link rel="stylesheet" href="css/header.css">
    <script src="librerias/jquery/jquery-3.2.1.min.js"></script>
    <script src="./librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
</head>

<body>
    <?php require "./Global/header.php"; ?>
    <section class="bitacora_extraccion">
        <div class="bitacora_extraccion">
            <form class="bitacora_extraccion_form">
                <div class="bit_extraccion_titulo">
                    <h1>Bitacora de extraccion</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="bitacora_datos">
                    <div class="bitacora_dato">
                        <input type="text">
                    </div>
                    <div class="datos">
                        <label for="fecha">Fecha:</label>
                        <input type="text">
                    </div>

                    <div class="dato1">
                        <div class="dat">
                            <label for="texto">Metodo utilizado segun descripto en PT/GIS/BM 01 a 06 en su version
                                actual</label>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">Auto XT</label>
                            </div>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">DNEasy</label>
                            </div>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">SV DNA</label>
                            </div>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">SV RNA</label>
                            </div>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">CTAB</label>
                            </div>
                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">Lisis</label>
                            </div>

                            <div class="chek">
                                <input type="checkbox">
                                <label for="dat">Otro:</label>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="dat_subtit">
                        <h3>Muestras trabajadas</h3>
                        <label for="tex">Areas:I -Inocuidad F-Fitosanitario BM -Biologia Molecular O -otro
                            especificar</label>
                    </div>

                    <div class="tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.registro</th>
                                    <th>Analisis</th>
                                    <th>Area</th>
                                    <th>Conc.ng/uL</th>
                                    <th>260/280</th>
                                    <th>260/230</th>
                                    <th>EDITAR</th>
                                    <th>ELIMINAR</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="equip">
                        <h3>Equipo utilizado</h3>

                        <div class="dat_selec">
                            <label type="number" for="extra">Extraccion1:</label>
                            <select>
                                <option value="">Selecciona una opción</option>
                            </select>
                        </div>

                        <div class="dat_selec1">
                            <label type="number" for="ex">Extraccion2:</label>
                            <select>
                                <option value="">Selecciona una opción</option>
                            </select>
                        </div>

                        <div class="dat_selec2">
                            <label type="number" for="ino">Inocuidad:</label>
                            <select>
                                <option value="">Selecciona una opción</option>
                            </select>
                        </div>

                    </div>

                    <div class="dat_realizo">
                        <label type="number" for="real">Realizo:</label>
                        <select>
                            <option value="">Selecciona una opción</option>
                        </select>

                    </div>

                    <div class="dat_superviso">
                        <label type="number" for="real">Superviso:</label>
                        <select>
                            <option value="">Selecciona una opción</option>
                        </select>

                    </div>


                </div>
            </form>
        </div>

    </section>


    <footer calss="Footer">
        <div class="Fotter_Contenedor">
            <div class="Footer_Logo">
                <img src="img/Smallfooterlogo.webp" alt="">
                <label for="Copyright">Gisenalabs® Todos los derechos reservados</label>
            </div>
        </div>
    </footer>
</body>

</html>

<?php  } ?>