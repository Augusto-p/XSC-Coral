<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria MiMundo</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico"
        type="image/x-icon">
</head>

<body>
    <!-- baner -->
    <?php require 'views/header.php';?>
    <!-- contenido -->
    <section class="content">
        <?php require 'views/adminPanel.php';?>
        <div class="conten-data">
            <div id="Formulario">
                <h2 id="titulo">Añadir Compra</h2>

                <div class="data">
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <select name="Editorial" id="Editorial" class="inputs">
                                    <option value="" selected disabled>Editorial</option>


                                </select>
                                <Button class="btnRefresh" type="button" onclick="refresheditoriales()"><img
                                        src="<?php echo constant('URL'); ?>public/Recursos/icons/refresh.svg"></Button>
                            </div>
                        </div>
                        <div class="col2 col">
                            <select name="Estado" id="Estado" class="inputs">
                                <option value="" selected disabled>Estado</option>
                                <option value="En Espera">En Espera</option>
                                <option value="Recibido">Recibido</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="datetime-local" name="FCompra" id="FCompra" placeholder="Fecha de Compra"
                                class="inputs">
                        </div>
                        <div class="col2 col">
                            <input type="text" name="MPago" id="MPago" placeholder="Método de pago" class="inputs">
                        </div>
                    </div>
                    <div class="row quad-row">
                        <div class="Tabla-Detalles">
                            <div class="Tabla-Detalles-Thead">
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-th"><span>ISBN</span></div>
                                    <div class="Tabla-Detalles-th"><span>Precio</span></div>
                                    <div class="Tabla-Detalles-th"><span>Cantidad</span></div>
                                    <div class="Tabla-Detalles-th"><span>Editar</span></div>
                                    <div class="Tabla-Detalles-th"><span>Eliminar</span></div>
                                </div>
                            </div>
                            <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles">
                            </div>

                        </div>




                    </div>

                    <div class="row">
                        <div class="colrow col">
                            <button class="AddDetalle" onclick="OpenDetalle()">Añadir Articulo</button>
                        </div>
                    </div>

                </div>
                <div id="save-div">
                    <button type="button" onclick="Send()">Guardar</button>
                </div>
            </div>
        </div>
    </section>

    <section class="PopUP-Window" id="PopUP-Window">
        <div class="PopUP-form">
            <div class="PopUP-Titulo">
                <h2>Añadir Articulo</h2>
            </div>
            <div class="PopUP-form-data">
                <div class="PopUP-form-data-img" id="PopUP-form-data-img-img">
                    <img src="" id="">
                </div>
                <div class="PopUP-form-data-content">
                    <div class="PopUP-form-data-row">
                        <input type="number" onkeyup="BuscarImg(event)" name="ISBN" id="ISBN" placeholder="ISBN"
                            class="inputs">
                    </div>
                    <div class="PopUP-form-data-row">
                        <input type="number" name="PU" id="PU" placeholder="Precio Unitario" class="inputs">
                    </div>
                    <div class="PopUP-form-data-row">
                        <input type="number" name="Cantidad" id="Cantidad" placeholder="Cantidad" class="inputs">
                    </div>
                </div>

            </div>
            <div class="PopUP-BTNs">
                <button class="PopUP-BTNs-can" onclick="CloseDetalle()">Cancelar</button>
                <button class="PopUP-BTNs-add" onclick="newDetalle()">Añadir Más</button>
                <button class="PopUP-BTNs-ace" onclick="AceptarDetalle()">Aceptar</button>
            </div>

        </div>
    </section>


    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Compra/Compra.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Compra/add.css">
</body>

<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Compra/Add.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>

</html>