<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libreria MiMundo</title>
<link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico" type="image/x-icon">
</head>

<body>
  <!-- baner -->
  <?php require 'views/header.php';?>
  <!-- contenido -->
  <section class="content">
    <?php require 'views/adminPanel.php';?>
    <div class="conten-data">
            <div id="Formulario">
                <h2 id="titulo">Eliminar Autor</h2>

                <div class="data">
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="number"  onkeyup="IDonKeyUp(event)" name="ID" id="ID" placeholder="ID" class="inputs">
                                <Button class="btnSeach" onclick="Seach()" type="button"><img
                                        src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg"></Button>
                            </div>
                        </div>
                        <div class="col2 col">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" class="inputs noselect" disabled>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="Nacionalidad" id="Nacionalidad" placeholder="Nacionalidad" disabled
                                class="inputs">

                        </div>
                        <div class="col2 col">
                            <input type="date" name="FNacimiento" id="FNacimiento" placeholder="Fecha de Nacimiento" disabled
                                class="inputs">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <img id="VFoto">
                        </div>
                        <div class="col2 col">
                        </div>
                    </div>

                    <div class="row triple-row">
                        <div class="col bioCol">
                            <textarea name="Biografia" id="Biografia" maxlength="500"
                                placeholder="Escriba su Biografia" disabled></textarea>
                        </div>


                        </textarea>
                    </div>

                </div>

                <div id="save-div">
                    <button type="button" onclick="send()">Eliminar</button>
                </div>
            </div>
        </div>
  </section>


  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Autor/autor.css">
</body>

<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Autor/Autor.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Autor/del.js"></script>

</html>