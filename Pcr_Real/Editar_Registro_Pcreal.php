<?php
ob_start();
session_start();

$_SESSION['Registro_Pcreal']=$_GET['Registro_Pcreal'];

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bitacora_pcr_tim_real.css" />
    <title>Bitacora PCR Tiempo Real</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ?>

    <section class="dat_pcr_tim_real">
        <div class="dat_pcr_tim_real_contenedor">
            <div class="dat_pcr_tim_real_titulo">
                <h1>Bitacora PCR Tiempo Real</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="dat_pcr_tim_real_for" id="Pcreal_Form">
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>No. Registro :</label>
                        <input type="text" name="Nombre" id="Nombre_pcreal" readonly>
                    </div>
                </div>
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Análisis:</label>
                        <select name="Patogeno" id="Analisis_pcreal"></select>
                    </div>
                    <div class="datos">
                        <label>Fecha:</label>
                        <input type="date" name="Fecha" id="Fecha_pcreal">
                    </div>
                </div>
                <div class="checks_pcreal">
                    <div class="datos_check">
                        <label>Sanitizo:</label>
                        <input type="checkbox" name="pcreal_sanitizo" id="pcreal_sanitizo" value="1" />
                    </div>
                    <div class="datos_check">
                        <label>Tiempo UV 20 min:</label>
                        <input type="checkbox" name="pcreal_uv" id="pcreal_uv" value="1" />
                    </div>
                </div>
                <div class="resultados_pcreal">
                    <div class="datos">
                        <label for="">Resultado:</label>
                        <select name="Resultado" id="Resultado_pcreal">
                            <option value="Negativo">Negativo</option>
                            <option value="Positivo">Positivo</option>
                        </select>
                    </div>
                    <div class="datos">
                        <label for="">Observaciones:</label>
                        <textarea name="pcreal_observaciones" id="pcreal_observaciones" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="dat_resul_titulo">
                    <h2>Especie Seleccionado</h2>
                </div>
                <div class="Datos_Metodo_Equipo">
                        <div class="dato Agregar_Equio_div">
                            <label>Selecciona Especie</label>
                            <select name="Especie_Select" id="Especie_Select"></select>
                            <label>Resultado:</label>
                            <select name="Resultado_Select" id="Resultado_Select">
                                <option value="Negativo">Negativo</option>
                                <option value="Positivo">Positivo</option>
                            </select>
                            <div class="Botones_Equipo">
                                <input type="button" value="Agregar Especie" id="Agregar_Especie">
                                <!--<input type="button" value="Agregar Todos los equipos" id="Agregar_Todo">-->
                            </div>
                            
                        </div>
                    <table>
                        <thead>
                            <th>No. Especie</th>
                            <th>Nombre Especie</th>
                            <th>Resultado</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="Especie_Tabla"></tbody>
                    </table>
                </div>
                <div class="botones">
                    <input type="button" value="Actualizar Registro" id="Editar_Pcr">
                    <input type="button" value="Cancelar" id="Ver_Bitacoras">
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
<script src="./js/Buscar_Analisis.js"></script>
<script src="js/Buscar_Registro.js"></script>
<script src="js/Buscar_Especies_Registro.js"></script>
<script src="js/Editar_Registro.js"></script>
<script src="../js/heder.js"></script>

<?php } ?>