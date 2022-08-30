<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- baner -->
  <?php require 'views/header.php';?>
  <!-- contenido -->
  <section class="content">
    <?php require 'views/adminPanel.php';?>
    <div class="conten-data">
            <form action="" method="post" id="Formulario">
                <h2 id="titulo">Modificar Autor</h2>

                <div class="data">
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="number" name="ID" id="ID" placeholder="ID" class="inputs">
                                <Button class="btnSeach" onclick="SeachAutor()"><img
                                        src="<?php echo constant('URL'); ?>public\Recursos\icons\lupa.svg"></Button>
                            </div>
                        </div>
                        <div class="col2 col">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" class="inputs">


                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="Nacionalidad" id="Nacionalidad" placeholder="Nacionalidad"
                                class="inputs">

                        </div>
                        <div class="col2 col">
                            <input type="date" name="FNacimiento" id="FNacimiento" placeholder="Fecha de Nacimiento"
                                class="inputs">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <img id="VFoto">
                        </div>
                        <div class="col2 col">
                            <input type="file" name="Foto" id="Foto">
                            <button type="button" id="btnAddimage">Añadir Imagen</button>
                        </div>
                    </div>

                    <div class="row triple-row">
                        <div class="col bioCol">
                            <textarea name="Biografia" id="Biografia" maxlength="500"
                                placeholder="Escriba su Biografia"></textarea>
                        </div>


                        </textarea>
                    </div>

                </div>

                <div id="save-div">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
  </section>


  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\Autor\autor.css">
</body>

<script src="<?php echo constant('URL'); ?>public\js\AdminPanel\Autor\Autor.js"></script>

</html>