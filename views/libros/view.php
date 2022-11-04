<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/view.css">
    <title>Libreria MiMundo</title>
<link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico" type="image/x-icon">
</head>
<body>
    
    <?php require 'views/header.php';?>

    <section class="big-contenedor">
        <section class="contenedor">
            <section class="slider-book">
                <button class="slider-book-btn" id="btn-slider-a">❮</button>
                <button class="slider-book-btn" id="btn-slider-s">❯</button>
                <div id="slider-book-image-box">
                    <img id="slider-book-image"> <!-- aca se mustra la imagen -->
                </div>
                
                <section id="book-image-pointer-section">
                    <!-- dependiendo de la cantiad de imagens insertadas se crean atraves de js -->
                </section>
            </section>
            <section class="info-book">
                <div class="info-book-in">
                    <span id="categorias-book-span">
                        Categorias:
                        <?php
                            foreach ($this->Book->categorias as $key => $value) {
                                echo '<a href="'.constant('URL').'book?Categoria='.$value.'" class="categoria-book">'.$value.'</a>';
                            }
                        ; ?>
                    </span>
                    <h2 id="titulo-book"><?=$this->Book->titulo;?></h2>
                    <p id="sipnosis-book"><?=$this->Book->sipnosis;?></p>
                    <h3 id="precio-book">$ <?=$this->Book->precio;?></h3>
                    <button id="btn-addCarrito" onclick="addCarrito(<?=$this->Book->isbn?>)">Añadir al carrito</button>

                    <!-- public $isbn;
                        public $idAutor; -->
                </div>

                <div id="editorial-book">
                    <div id="editorial-book-name">
                        <img src="<?php echo constant('URL'); ?><?=$this->Editorial->logo;?>" id="input-img-editorial">
                        <h3 id="input-nombre-editorial"><?=$this->Editorial->nombre;?></h3>
                    </div>
                    <div class="info-editorial-book">
                        <a id="info-editorial-book-dir" target="_blank" href="https://maps.google.com/?q=<?=$this->Editorial->direccion;?>">
                            <img src="<?php echo constant('URL'); ?>public/Recursos/icons/office.svg"><?=$this->Editorial->direccion;?></a>
                    </div>
                    <div class="info-editorial-book">
                        <a href="tel:<?=$this->Editorial->telefono;?>"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/phone.svg"><?=$this->Editorial->telefono;?></a>
                    </div>
                    <div class="info-editorial-book">
                        <a href="mailto:<?=$this->Editorial->email;?>"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/email.svg">Correo Electronico</a>
                    </div>
                    <div class="info-editorial-book">
                        <a href="<?=$this->Editorial->web;?>"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/web.svg">Pagina Web</a>
                    </div>
                </div>



                </div>

            </section>

            <section id="info-autor-book-section">

                <div id="info-autor-book">
                    <div id="autor-book">
                        <img id="img-autor-book" src="">
                        <h3 id="nombre-autor-book"></h3>
                    </div>
                    <div id="data-autor-book">
                        <div id="data-autor-book-fn">
                            <h4>Fecha de nacimiento:</h4>
                            <h4 id="data-autor-book-fn-in"></h4>
                        </div>
                        <div id="data-autor-book-na">
                            <h4>Nacionalidad:</h4>
                            <h4 id="data-autor-book-na-in"></h4>
                            <img src="" alt="" id="autor-image-country">
                            <!-- aca se muestra la bandera  ej ../Recursos/icons/flags/reino-unido.svg-->

                        </div>
                    </div>

                    <p id="bio-autor-book"></p>

                    <div id="autor-book-slider">
                        <button class="autor-btn" id="btn-autor-a">❮</button>
                        <section id="slider-autor-pointers-div">
                            <!-- dependiendo de la cantidad de libros del autor se crean -->


                        </section>
                        <button class="autor-btn" id="btn-autor-s">❯</button>
                    </div>
                </div>
            </section>
    </section>
    </section>
    <?php require 'views/footer.php';?>


</body>
<script src="<?php echo constant('URL'); ?>public/js/Book/view.js"></script>


<?php //se cargan los autores del libro
foreach ($this->Autores as $key => $autor) {
    echo '<script>addbookAutor('.$autor->id.',`'.$autor->nombre.'`,`'.$autor->nacionalidad.'`,`'.$autor->biografia.'`,`'.$autor->Fnacimento.'`,`'.constant('URL').$autor->foto.'`)</script>'; //'","'
}; ?>

<?php //se cargan las imagenes
foreach ($this->Book->imagenes as $key => $value) {
    echo '<script>addbookimage("'.constant('URL').$value.'");</script>';
}; ?>


<script>const Paises = <?=$this->Paises;?>;</script>
<script>
    run() // se llama a la funcion run que inserta los datos de los autores y las imagenes en la vista
</script>
</html>