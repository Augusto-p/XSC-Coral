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
                <h2 id="titulo">Ventas</h2>
                <div class="Select-Zone">
                    <div class="Select-Div">
                        <div class="Select-Div-in">
                            <input type="radio" name="Modo" id="Radio-All" checked onchange="ChangeMod(0)">
                            <label for="Radio-All">Todo</label>
                        </div>
                        <div class="Select-Div-in">
                            <input type="radio" name="Modo" id="Radio-Editorial" onchange="ChangeMod(1)">
                            <label for="Radio-Editorial">Usuario</label>
                        </div>
                        <div class="Select-Div-in">
                            <input type="radio" name="Modo" id="Radio-Estado" onchange="ChangeMod(2)">
                            <label for="Radio-Estado">Estado</label>
                        </div>
                        <div class="Select-Div-in">
                            <input type="radio" name="Modo" id="Radio-MetododePago" onchange="ChangeMod(3)">
                            <label for="Radio-MetododePago">Método de Pago</label>
                        </div>
                        <div class="Select-Div-in">
                            <input type="radio" name="Modo" id="Radio-Fecha" onchange="ChangeMod(4)">
                            <label for="Radio-Fecha">Fecha</label>
                        </div>

                    </div>
                    <div class="select-Values">
                        <!-- Usuario -->
                        <div class="Select_NotView">
                            <input type="text" id="Select_Usuario" class="inputs" placeholder="Email"
                                onkeyup="getbyUsuario(event)">

                        </div>
                        <!-- estado -->
                        <div class="Select_NotView">
                            <select name="Estado" id="Select_Estado" class="inputs" onchange="getbyEstado()">
                                <option value="" selected disabled>Estado</option>
                                <option value="Enviado">Enviado</option>
                                <option value="Entregado">Entregado</option>
                                <option value="Procesando">Procesando</option>
                            </select>
                        </div>
                        <!-- MP -->
                        <div class="Select_NotView">
                            <select name="Select_MP" id="Select_MP" class="inputs" onchange="getbyMP()">
                                <option value="" selected disabled>Método de Pago</option>
                                <option value="Credito">Crédito</option>
                                <option value="Debito">Débito</option>
                            </select>
                        </div>
                        <!-- Fecha -->
                        <div class="Select_NotView">
                            <input type="date" name="FechaIN" id="Select_FechaIN" class="inputs">
                            <input type="date" name="FechaOUT" id="Select_FechaOUT" class="inputs">
                            <Button class="btnSeach" onclick="getbyFecha()" type="button"><img
                                    src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg"></Button>
                        </div>

                    </div>
                </div>



                <div class="data">
                    <div class="Tabla-Detalles">
                        <div class="Tabla-Detalles-Thead" onscroll="ScrollTable(1)">
                            <div class="Tabla-Detalles-tr">
                                <div class="Tabla-Detalles-th"><span>ID</span></div>
                                <div class="Tabla-Detalles-th"><span>Usuario</span></div>
                                <div class="Tabla-Detalles-th"><span>Fecha Hora</span></div>
                                <div class="Tabla-Detalles-th"><span>Pago</span></div>
                                <div class="Tabla-Detalles-th"><span>Estado</span></div>
                                <div class="Tabla-Detalles-th"><span>Total</span></div>
                                <div class="Tabla-Detalles-th"><span>Detalles</span></div>
                                <div class="Tabla-Detalles-th"><span>Eliminar</span></div>
                            </div>
                        </div>
                        <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles" onscroll="ScrollTable(0)">

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="PopUP-Window" id="PopUP-Window">
        <div class="PopUP-form">
            <div class="PopUP-Titulo">
                <h2>Detalles de la Compra</h2>
            </div>
            <div class="PopUP-form-data">
                <div class="Tabla-Detalles">
                    <div class="Tabla-Detalles-Thead" onscroll="ScrollTablePop(1)">
                        <div class="Tabla-Detalles-tr">
                            <div class="Tabla-Detalles-th"><span>ISBN</span></div>
                            <div class="Tabla-Detalles-th"><span>Precio Unitario</span></div>
                            <div class="Tabla-Detalles-th"><span>Descuento</span></div>
                            <div class="Tabla-Detalles-th"><span>Cantidad</span></div>
                            <div class="Tabla-Detalles-th"><span>Ver</span></div>
                        </div>
                    </div>
                    <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles-POPUP" onscroll="ScrollTablePop(0)">
                    </div>
                </div>

            </div>
            <div class="PopUP-BTNs">

                <button class="PopUP-BTNs-close" onclick="ClosePopUP()">Cerrar</button>

            </div>

        </div>
    </section>


    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Venta/Venta.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Venta/listar.css">
    <?php 
  require_once 'utilidades/Formatos.php';
  if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") != "Administrador"){ ?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Compra/NoAdmin.css">
    <?php }; ?>
</body>

<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Venta/listar.js"></script>

</html>