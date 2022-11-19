<!DOCTYPE html>
<html lang="en">
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
                <h2 id="titulo">Alertas de Stock</h2>
                
                <div class="data">
                    <div class="Tabla-Detalles">
                        <div class="Tabla-Detalles-Thead" onscroll="ScrollTable(1)">
                            <div class="Tabla-Detalles-tr">
                                <div class="Tabla-Detalles-th"><span>ISBN</span></div>
                                <div class="Tabla-Detalles-th"><span>Titulo</span></div>
                                <div class="Tabla-Detalles-th"><span>Stock</span></div>
                            </div>
                        </div>
                        <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles" onscroll="ScrollTable(0)">

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </section>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Info/style.css">
</body>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Info/main.js"></script>

</html>