<?php
ob_start();
session_start();

$_SESSION['RegistroPcr']=$_GET['RegistroPcr'];


$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{ ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Bitacoras_Pcr.css">
    <title>Bitacora PCR</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>

    <section class="Pcr">
        <div class="Pcr_Contenedor">
            <div class="Pcr_titulo">
                <h1>Bitacora de PCR</h1>
                <div class="Linea"></div>
            </div>
            <form class="Pcr_Form" id="Pcr_Form">
                <div class="Pcr_Form_Datos">
                    <div class="Pcr_Datos">
                        <div class="Datos">
                            <label for="Pcr_Registros">No. Registro:</label>
                            <input type="text" name="Pcr_Registros" id="Pcr_Registros">
                        </div>
                    </div>
                    
                    <div class="Pcr_Datos">
                        <div class="Datos">
                            <label for="Pcr_Analisis">Analisis:</label>
                            <select name="Pcr_Analisis" id="Pcr_Analisis"></select>
                        </div>
                        <div class="Datos">
                            <label for="Pcr_Fecha">Fecha:</label>
                            <input type="date" name="Pcr_Fecha">
                        </div>
                    </div>

                    <div class="Pcr_Datos">
                        <div class="Datos">
                            <label for="Pcr_Agrosa">Agrosa:</label>
                            <input type="text" name="Pcr_Agrosa">
                        </div>
                        <div class="Datos">
                            <label for="Pcr_Voltage">Voltage:</label>
                            <input type="text" name="Pcr_Voltage">
                        </div>
                        <div class="Datos">
                            <label for="Pcr_Tiempo">Tiempo (min):</label>
                            <input type="text" name="Pcr_Tiempo">
                        </div>
                    </div>
                    <div class="Pcr_Espece_Check">
                        <div class="Check">
                            <input type="checkbox" name="Sanitizo" value="1" ><label for="Canino">Sanitizo</label>
                        </div>
                        <div class="Check">
                            <input type="checkbox" name="Tiempouv" value="1" ><label for="Canino">Tiempo UV</label>
                        </div>
                    </div>

                    <div class="Pcr_Especie">
                        <div class="Pcr_Especie_Titulo">
                            <h2>Especies:</h2>
                            <div class="Linea"></div>
                        </div>
                        <div class="Pcr_Equipo_contenedor">
                            <div class="Pcr_Equipo_Selecionar">
                                <div class="Datos">
                                    <label for="Pcr_Espceie">Especie:</label>
                                    <select name="Pcr_Espceie" id="Pcr_Espceie"></select>
                                </div>
                                <div class="Datos">
                                    <label for="Pcr_Resultado">Resultado:</label>
                                    <select name="Pcr_Resultado" id="Pcr_Resultado">
                                        <option value="Negativo">Negativo</option>
                                        <option value="Positivo">Positivo</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="Pcr_Equipo_Tabla">
                                <table>
                                    <thead>
                                        <th>No. Especie</th>
                                        <th>Nombre Especie</th>
                                        <th>Resultado</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody id="Tabala_Especie"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="Pcr_Datos">
                        <div class="Pcr_Equipo_Boton">
                            <input type="button" id="Agregar_Especie" value="Agregar Especie">
                        </div>
                        <div class="Datos">
                            <label for="Pcr_Imagen">Imagen o Archivo:</label>
                            <input type="file" required name="Pce_Imagen" accept="image/jpg,image/png,application/pdf">
                        </div>
                    </div>
                    <div class="Linea"></div>

                    <div class="Pcr_Botones">
                        <input type="button" value="Agregar Pcr" id="Agregar_Pcr">
                        <input type="button" value="Ver Bitacoras" id="Ver_Bitacoras">
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </section>

    <?php require "../global/footer.php" ?>
</body>
</html>

<script src="js/scripts.js"></script>
<script src="js/Buscar_Datos.js"></script>
<script src="../js/heder.js"></script>
<script src="js/Buscar_Tabla_Especie_Editar.js"></script>

<?php }  ?>