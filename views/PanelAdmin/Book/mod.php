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
                <h2 id="titulo">Modificar Libro</h2>
                <div class="data">
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="number" name="ISBN" id="ISBN" placeholder="ISBN" class="inputs">
                                <Button class="btnSeach"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\lupa.svg"></Button>
                            </div>
                            
                        </div>
                        <div class="col2 col">
                            <input type="text" name="Titulo" id="Titulo" placeholder="Titulo" class="inputs">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="number" name="Precio" id="Precio" placeholder="Precio" class="inputs">

                        </div>
                        <div class="col2 col">
                            <div class="row-in-col">
                                <select name="Editorial" id="Editorial" class="inputs">
                                    <option value="" selected disabled>Editorial</option>


                                </select>
                                <Button class="btnRefresh"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\refresh.svg"></Button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="text" name="Categoriain" id="Categoriain" placeholder="Categorias"
                                    class="inputs">
                                <Button type="button" class="btnadd" onclick="addCat()"><img
                                        src="<?php echo constant('URL'); ?>public\Recursos\icons\add.svg"></Button>
                            </div>
                        </div>
                        <div class="col2 col">
                            <div class="row-in-col">
                                <select name="Autor" id="Autor" class="inputs">
                                    <option value="" selected disabled>Autor</option>

                                </select>
                                <Button class="btnRefresh"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\refresh.svg"></Button>
                                <Button type="button" class="btnadd" onclick="addAutor()"><img
                                        src="<?php echo constant('URL'); ?>public\Recursos\icons\add.svg"></Button>
                            </div>
                        </div>
                    </div>
                    <div class="row doble-row">
                        <div class="col1 col colSc">
                            <div class="sroliable">
                                <div id="CategoriasDiv">

                                </div>
                            </div>


                        </div>
                        <div class="col2 col colSc">
                            <div class="sroliable">
                                <div id="AutoresDiv">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row triple-row">
                        <div class="col sipCol">
                            <textarea name="Sipnosis" id="Sipnosis" placeholder="Escriba una Sipnosis"></textarea>

                        </div>

                    </div>
                    <div id="not-view">
                        <div id="not-view-Categorias"></div>
                        <div id="not-view-images"></div>
                        <div id="not-view-Autores"></div>

                    </div>

                    <div class="row quad-row">
                        <div class="row triple-row image-up-row">
                            <div class="Scroleable-H">
                                <div id="ImagenesDiv">

                                </div>


                            </div>

                        </div>
                        <div class="row image-down-row">

                            <button type="button" id="addImage"><input type="file" name="Img[]" class="addImagein">+
                                Añadir Imagen</button>

                        </div>

                    </div>
                </div>



                <div id="save-div">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </section>


<link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\Book\style.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\Book\modbook.css">
</body>
<script src="<?php echo constant('URL'); ?>public\js\AdminPanel\Book\main.js"></script>

</html>