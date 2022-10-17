<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libreria MiMundo</title>
</head>

<body>
  <!-- baner -->
  <?php require 'views/header.php';?>
  <!-- contenido -->
  <section class="content">
    <?php require 'views/adminPanel.php';?>
    <div class="conten-data">
            <div id="Formulario">
                <h2 id="titulo">Listado de Compras</h2>

                <div class="Select-Div">
                    <input type="radio" name="Modo" placeholder="Todo">
                    <input type="radio" name="Modo" value="Editorial">
                    <input type="radio" name="Modo" value="Estado">
                    <input type="radio" name="Modo" value="Metodo de Pago">
                    <input type="radio" name="Modo" value="Fecha">
                    <input type="radio" name="Modo" value="Buscar">
                    
                    
                </div>

                <div class="data">
                            <div class="Tabla-Detalles">
                            <div class="Tabla-Detalles-Thead">
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-th"><span>ID</span></div>
                                    <div class="Tabla-Detalles-th"><span>Editorial</span></div>
                                    <div class="Tabla-Detalles-th"><span>Fecha Hora</span></div>
                                    <div class="Tabla-Detalles-th"><span>Estado</span></div>
                                    <div class="Tabla-Detalles-th"><span>Total</span></div>
                                    <div class="Tabla-Detalles-th"><span>Detalles</span></div>
                                    <div class="Tabla-Detalles-th"><span>Eliminar</span></div>
                                </div>
                            </div>
                            <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles">
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                                <div class="Tabla-Detalles-tr">
                                    <div class="Tabla-Detalles-td"><span>1</span></div>
                                    <div class="Tabla-Detalles-td"><span>Libros Cúpula</span></div>
                                    <div class="Tabla-Detalles-td"><span>2022-10-16 23:33:20</span></div>
                                    <div class="Tabla-Detalles-td"><span>En Espera</span></div>
                                    <div class="Tabla-Detalles-td"><span>708000.00</span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="EditDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/ver.svg"></span></div>
                                    <div class="Tabla-Detalles-td"><span onclick="DelDetalle()"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Papelera.svg"></span></div>
                                </div>
                           
                            </div>
                            

                        </div>           
                    
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
                    <input type="number" onkeyup="BuscarImg(event)" name="ISBN" id="ISBN" placeholder="ISBN" class="inputs">
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
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Compra/listar.css">
</body>

<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Compra/Add.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>

</html>