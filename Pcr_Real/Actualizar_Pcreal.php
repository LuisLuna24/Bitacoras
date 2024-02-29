<?php
ob_start();
session_start();
if(isset($_GET['No_Folio'])){
    $_SESSION["pcreal_fol"]=$_GET['No_Folio'];
}else{
    $_SESSION["pcreal_fol"];
}

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
                <h1>Bitacora PCR Tiempo Real Actualizar</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="dat_pcr_tim_real_for" id="Pcreal_Form">
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>No. Registro :</label>
                        <input type="text" name="Nombre" />
                    </div>
                    <div class="datos">
                        <label>Cantidad:</label>
                        <input type="text" name="Cantidad" />
                    </div>
                </div>
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Análisis:</label>
                        <select name="Patogeno" id="Analisis_pcreal"></select>
                    </div>
                    <div class="datos">
                        <label>Fecha:</label>
                        <input type="date" name="Fecha" />
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
                <div class="dat_resul_titulo">
                    <h2>Equipo Seleccionado</h2>
                </div>
                <div class="Datos_Metodo_Equipo">
                        <div class="dato Agregar_Equio_div">
                            <label>Selecciona Equipo</label>
                            <select name="Equipo_SelectAgregar" id="Equipo_Select"></select>
                            <div class="Botones_Equipo">
                                <input type="button" value="Agregar Equipo" id="Agregar_Equipo_Actualizar">
                                <!--<input type="button" value="Agregar Todos los equipos" id="Agregar_Todo">-->
                            </div>
                            
                        </div>
                    <table>
                        <thead>
                            <th>No. Equipo</th>
                            <th>Nombre Equipo</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="Equipo_Tabla"></tbody>
                    </table>
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
                        <textarea name="pcreal_observaciones" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="botones">
                    <input type="button" value="Agregar PCR" id="Agregar_Actualizar_Pcreal">
                    <input type="button" value="Ver Bitacroas" id="Ver_Bitacoras">
                </div>
            </form>
            <div class="Equipo_Tabla">
                <div class="Acciones_Tabla">
                    <div class="Datos">
                        <label for="">Mostrar:</label>
                        <select name="num_registros" id="num_registros">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="Dato">
                        <label for="buscar">Buscar PCR Tiempo Real:</label>
                        <input type="text" id="campo" name="campo" />
                    </div>
                </div>

                <table>
                    <thead>
                        <th>No. Registro</th>
                        <th>Analisis</th>
                        <th>Fecha</th>
                        <th>Sanitizo</th>
                        <th>Tiempo Uv</th>
                        <th>Resultado</th>
                        <th>Observaciones</th>
                        <th>Editar</th>
                    </thead>
                    <tbody id="content"></tbody>
                </table>
                <div class="Tablas_Paginas" id="nav-paginacion"></div>
            </div>
        </div>
    </section>

    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="./js/scripts.js"></script>
<script src="./js/Buscar_Analisis.js"></script>
<script src="./js/Buscar_Equipo.js"></script>
<script src="./js/Agregar_Equipo_Actualizado.js"></script>
<script src="./js/Agregar_Actualizar_Pcreal.js"></script>
<script src="./js/Buscar_Vercion_Pcreal.js"></script>
<script src="../js/heder.js"></script>

<?php } ?>