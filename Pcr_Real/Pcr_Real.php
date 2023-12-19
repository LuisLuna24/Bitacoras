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
                <h1>Bitacora PCR Tiempo Real</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="dat_pcr_tim_real_for" id="Pcreal_Form">
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Nombre:</label>
                        <input type="text" name="Nombre" />
                    </div>
                    <div class="datos">
                        <label>Cantidad:</label>
                        <input type="text" name="Cantidad" />
                    </div>
                </div>
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Patogeno:</label>
                        <select name="Patogeno" id="Patogeno">
                            <option value="1">Listeria</option>
                        </select>
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
                <div class="resultados_pcreal">
                    <div class="datos">
                        <label for="">Resultado:</label>
                        <select name="Resultado" id="Resultado_pcreal">
                            <option value="Positivo">Positivo</option>
                            <option value="Negativo">Negativo</option>
                        </select>
                    </div>
                    <div class="datos">
                        <label for="">Observaciones:</label>
                        <textarea name="pcreal_observaciones" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="botones">
                    <input type="button" value="Agregar PCR" id="Agregar_Pcreal" />
                    <input type="button" value="Ver Bitacroas" id="Ver_Bitacoras">
                    <input type="button" value="Eliminar Folio" />
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
                        <label for="buscar">Buscar equipo</label>
                        <input type="text" id="campo" name="campo" />
                    </div>
                </div>

                <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Patogeno</th>
                        <th>Fecha</th>
                        <th>Resultado</th>
                        <th>Sanitizo</th>
                        <th>Uv</th>
                        <th>Observacion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
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
<script src="./js/Agregar_Pcr.js"></script>
<script src="./js/Buscar_Patogeno.js"></script>
<script src="./js/Buscar_Pcreal.js"></script>
<?php }  ?>