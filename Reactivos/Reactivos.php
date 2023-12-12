<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alta_reactivos.css">
    <title>Alta de Reactivo</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css">
</head>

<body>
<?php require "../global/header.php" ;?>

    <section class="datos_alta">
        <div class="datos_alta_contenedor">
            <form class="datos_alta_form">
                <div class="datos_alta_titulo">
                    <h1>Alta de Reactivos</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat-datos">
                    <div class="datoo">
                        <div>
                            <label for="dat1">Nombre del Reactivo:</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="dat2">Identificador:</label>
                            <input type="text">
                        </div>
                    </div>

                    <div class="datoo">
                        <div>
                            <label for="dat3">No lote:</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="dat4">Abreviatura:</label>
                            <input type="text">
                        </div>
                    </div>

                    <div class="datoos">
                        <label for="dat5">Descripcion:</label>
                        <input type="text">
                    </div>
                </div>

                <div class="botones">
                    <input type="submit" value="Dar de Alta">
                    <input type="submit" value="Cancelar">
                </div>

                <div class="padre">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Reactivo</th>
                                <th>Identificador</th>
                                <th>No lote</th>
                                <th>Abreviatura</th>
                                <th>Descripcion</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="boton">
                    <input type="submit" value="Actualizar">
                    <input type="submit" value="Bitacora X">
                </div>

            </form>
        </div>
    </section>
</body>

</html>

<script src="./js/scripts.js"></script>