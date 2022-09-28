<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> -->
    <title>Libreria MiMundo</title>
</head>

<body>
    <?php require 'views/header.php';?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Home/style.css">
    <div class="banner1">
        <a href="#" target="_blank"><img class="baner" src="<?=$this->UrlBanerP;?>"></a>
    </div>
    <section class="producto">
        <h2 class="cat-prod">Libros</h2>
        <div class="slider-div">
            <section class="slider">
                <div class="btn-slider btn-slider-before" id="btn-slider-1">
                    <h2 class="noselect">
                        ❮</h2>
                </div>
                <div class="slider-content">
                    <div class="slider-content-view">
                        <div class="slider-content-in">
                            <?php foreach ($this->Slider1 as $key => $book) {;?>
                                <a href="<?php echo constant('URL'); ?>book/view?id=<?=$book->isbn;?>">
                                <div class="slider-item">
                                    <div class="slider-item-up" style="background-image: url('<?php echo constant('URL'); ?><?=$book->imagenes[0];?>')">
                                        <div class="slider-item-up-up">
                                            <span class="slider-item-precio">$<?=$book->precio;?></span>
                                        </div>
                                        <div class="slider-item-up-down">
                                            <button class="slider-item-addCarito">Añadir al carrito</button>
                                        </div>
                                    </div>
                                    <div class="slider-item-down">

                                        <h2 class="slider-item-titulo"><?=$book->titulo;?></h2>

                                    </div>
                                </div>
                            </a>
                            <?php }
;?>




                        </div>
                    </div>
                    <div class="slider-pointer">
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span><span class="slider-pointer-item"></span><span
                            class="slider-pointer-item"></span><span class="slider-pointer-item"></span><span
                            class="slider-pointer-item"></span><span class="slider-pointer-item"></span>
                    </div>
                </div>
                <div class="btn-slider btn-slider-next" id="btn-slider-2">
                    <h2 class="noselect">❯</h2>
                </div>


            </section>
        </div>
    </section>

    <div class="banners">
        <a href="#"><img src="<?=$this->UrlBanerP1;?>"></a>

        <a href="#"><img src="<?=$this->UrlBanerP2;?>"></a>

    </div>
    <section class="producto">
        <h2 class="cat-prod">Libros</h2>
        <div class="slider-div">
            <section class="slider">
                <div class="btn-slider btn-slider-before" id="btn-slider-3">
                    <h2 class="noselect">
                        ❮</h2>
                </div>
                <div class="slider-content">
                    <div class="slider-content-view">
                        <div class="slider-content-in">

                        <?php foreach ($this->Slider2 as $key => $book) {;?>
                                <a href="<?php echo constant('URL'); ?>book/view?id=<?=$book->isbn;?>">
                                <div class="slider-item">
                                    <div class="slider-item-up" style="background-image: url('<?php echo constant('URL'); ?><?=$book->imagenes[0];?>')">
                                        <div class="slider-item-up-up">
                                            <span class="slider-item-precio">$<?=$book->precio;?></span>
                                        </div>
                                        <div class="slider-item-up-down">
                                            <button class="slider-item-addCarito">Añadir al carrito</button>
                                        </div>
                                    </div>
                                    <div class="slider-item-down">

                                        <h2 class="slider-item-titulo"><?=$book->titulo;?></h2>

                                    </div>
                                </div>
                            </a>
                            <?php }
;?>



                        </div>
                    </div>
                    <div class="slider-pointer">
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span><span class="slider-pointer-item"></span><span
                            class="slider-pointer-item"></span><span class="slider-pointer-item"></span><span
                            class="slider-pointer-item"></span><span class="slider-pointer-item"></span>
                    </div>
                </div>
                <div class="btn-slider btn-slider-next" id="btn-slider-4">
                    <h2 class="noselect">❯</h2>
                </div>


            </section>
        </div>
    </section>

    <?php require 'views/footer.php';?>

</body>
<script src="<?php echo constant('URL'); ?>public/js/home/main.js"></script>

</html>